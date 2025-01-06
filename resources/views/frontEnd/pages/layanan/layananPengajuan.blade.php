@extends('frontend.layout.layout')

@section('link')
<!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="hero" style="height: 72vh; background-image: url('{{ asset('assets/images/layananKami/Dog_Human_1.jpg') }}'); background-position: center;">
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Pengajuan Penyerahan Hewan</p>
    </div>
</section>

@if($shelterInformation->is_accepting_handover == 0)
<section>
    <div class="container">
        <h1 class="text-center">Pengajuan Penyerahan Hewan</h1>
        <hr />
        <div class="alert alert-info text-center">
            Shelter Sedang Tidak Melayani Pengajuan Penyerahan Hewan
        </div>
    </div>
</section>
@else
<section id="section-1-layanan-penyerahan">
    <div class="container">
        <div class="row my-2">
            <h1 class="text-center">Formulir Pengajuan Penyerahan Hewan</h1>
            <hr />
            <div class="col">
                <div class="mt-3">
                    {!! $shelterInformation->handover_information !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container border border-black my-2" style="border-radius: 16px">
        <form action="{{ route('layanan-pengajuan.create.Post') }}" method="post" class="m-4" enctype="multipart/form-data" id="formPenyerahan">  
            @csrf
            {{-- Profile User --}}
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Nama Pengaju</label>
                    <input type="text" name="namaPemilik" id="namaPemilik" class="form-control" value="{{$user->name}}" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Nomor Telepon</label>
                    <input type="text" name="noTelp" id="noTelp" class="form-control" value="{{$user->phone_number}}" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-2">Nomor Whatsapp</label>
                    <input type="text" name="noWhatsapp" id="noWhatsapp" class="form-control" value="{{$user->whatsapp_number}}" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Alamat</label>
                    <input type="text" name="alamatPemilik" id="alamatPemilik" class="form-control" value="{{$user->address}}" disabled>
                </div>
            </div>
            <hr>
            <div class="row my-1">
                <div class="col my-2 d-flex flex-column justify-content-center">
                    <label for="" class="my-2">Unggah Foto Hewan Anda</label>
                    <input type="file" class="form-control" name="fotoHewanHandover" required>
                </div>
            </div>
            
            <!-- Displaying the handover questions -->
            <div class="row my-2">
                <div class="col">
                    @foreach($handoverQuestions as $question)
                    <div class="col">
                        <label>{{ $question->questions }}</label>
                        @switch($question->handover_questions_id)
                            @case(2)
                                <select class="form-control my-2" name="answers[{{ $question->handover_questions_id }}]" placeholder="Masukan Jawaban Anda" required>
                                    <option value="" selected disabled>Pilih Jenis Hewan</option>
                                    <option value="Anjing">Anjing</option>
                                    <option value="Kucing">Kucing</option>
                                </select>
                                @break
                            @case(3)
                                <input type="date" class="form-control my-2" name="answers[{{ $question->handover_questions_id }}]" id="tanggalLahir" max="{{ date('Y-m-d') }}"  placeholder="Masukan Jawaban Anda" required> <!-- Added ID for tanggal lahir -->
                                @break
                            @case(4)
                                <select class="form-control my-2" name ="answers[{{ $question->handover_questions_id }}]" placeholder="Masukan Jawaban Anda" required>
                                    <option value="" selected disabled>Pilih Jenis Kelamin Hewan</option>
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                                @break
                            @case(7)
                                <input type="number" class="form-control my-2" name="answers[{{ $question->handover_questions_id }}]" step="0.01" min="0" placeholder="Masukan Jawaban Anda" required>
                                @break
                            @case(9)
                                <select class="form-control my-2" name="answers[{{ $question->handover_questions_id }}]" placeholder="Masukan Jawaban Anda" required>
                                    <option value="" selected disabled>Pilih Sudah/Belum</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                                @break
                            @default
                                <textarea class="form-control my-2" name="answers[{{ $question->handover_questions_id }}]" rows="3" placeholder="Masukan Jawaban Anda" required></textarea>
                        @endswitch
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="gap-3 my-10 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit" style="border: 0;" id="submitForm">Kirim Pengajuan</button>
            </div>
        </form>
    </div>
</section>

@if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Oke',
        });
    </script>
@endif

@endif
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalLahirInput = document.getElementById('tanggalLahir');
        const usiaHewanInput = document.getElementById('usiaHewan'); 
    
        function calculateAge() {
            const birthDate = new Date(tanggalLahirInput.value);
            const today = new Date();
            
            let ageInMonths = (today.getFullYear() - birthDate.getFullYear()) * 12;
            ageInMonths += today.getMonth() - birthDate.getMonth();
            
            if (today.getDate() < birthDate.getDate()) {
                ageInMonths--;
            }
    
            let years = Math.floor(ageInMonths / 12);
            let months = ageInMonths % 12;
    
            if (ageInMonths < 0) {
                years = 0;
                months = 0;
            }
    
            let ageString = '';
            if (years > 0) {
                ageString += `${years} Tahun `;
            }
            if (months > 0 || years === 0) {
                ageString += `${months} Bulan`;
            }
            if (years === 0 && months === 0) {
                ageString = '0 Bulan';
            }
    
            usiaHewanInput.value = ageString; // Display the calculated age
        }
    
        tanggalLahirInput.addEventListener('change', calculateAge); // Calculate age on date change
    });
</script>

<script>
    document.getElementById('tanggalLahir').addEventListener('input', function(e) {
        const selectedDate = new Date(this.value);
        const today = new Date();
    
        if (selectedDate > today) {
            alert('Tanggal lahir tidak boleh lebih dari hari ini');
            this.value = '';
        }
    });
</script>

<script>
    document.getElementById('submitForm').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission by default

        // Show SweetAlert2 confirmation popup
        Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Jawaban Anda Tidak Dapat Diubah Kembali",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Saya Yakin',
                cancelButtonText: 'Tidak, Saya Ingin Mengubahnya',
            }).then((result) => {
                if (result.isConfirmed) {
                    // If "Yes, submit it!" is clicked, submit the form
                    document.getElementById('formPenyerahan').submit();
                }
            });
    });
</script>
@endsection