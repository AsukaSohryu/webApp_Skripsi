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

<section id="hero" style='height: 72vh; background-image: url("./assets/images/tentangKami/owl.jpg"); background-position: center;'>
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Pengajuan Penyerahan Hewan</p>
    </div>
</section>

<section id="section-1-layanan-penyerahan">
    <div class="container">
        <div class="row my-2">
            <div class="col">
                <h5>Formulir Pengajuan Penyerahan Hewan</h5>
                <div class="mt-3">
                    {!! $shelterInformation->handover_information !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container border border-black my-2" style="border-radius: 16px">
        <form action="{{ route('layanan-pengajuan.create.Post') }}" method="post" class="m-4" enctype="multipart/form-data">  
            @csrf
            {{-- Profile User --}}
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Nama Pemilik</label>
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
                    <label for="" class="my-2">Alamat Pemilik</label>
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
                                    <option value="Anjing">Anjing</option>
                                    <option value="Kucing">Kucing</option>
                                </select>
                                @break
                            @case(3)
                                <input type="text" class="form-control my-2" name="answers[{{ $question->handover_questions_id }}]" id="usiaHewan" disabled> <!-- Ensure this is enabled -->
                                @break
                            @case(4)
                                <input type="date" class="form-control my-2" name="answers[{{ $question->handover_questions_id }}]" id="tanggalLahir" placeholder="Masukan Jawaban Anda" required> <!-- Added ID for tanggal lahir -->
                                @break
                            @case(5)
                                <select class="form-control my-2" name ="answers[{{ $question->handover_questions_id }}]" placeholder="Masukan Jawaban Anda" required>
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                                @break
                            @case(8)
                                <input type="number" class="form-control my-2" name="answers[{{ $question->handover_questions_id }}]" placeholder="Masukan Jawaban Anda" required>
                                @break
                            @case(10)
                                <select class="form-control my-2" name="answers[{{ $question->handover_questions_id }}]" placeholder="Masukan Jawaban Anda" required>
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
                <button class="btn btn-primary" type="submit" style="border: 0;">Kirim Pengajuan</button>
            </div>
        </form>
    </div>
</section>
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


@endsection