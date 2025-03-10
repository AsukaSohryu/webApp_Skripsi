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

{{-- <section id="hero" style="height: 72vh; background-image: url('{{ asset('assets/images/layananKami/Dog_Human_1.jpg') }}'); background-position: center;">
</section> --}}

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Ajukan Penyerahan Hewan Peliharaan</p>
    </div>
</section>

@if($shelterInformation->is_accepting_handover == 0)
<section>
    <div class="container">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Ajukan Penyerahan Hewan Peliharaan</h1>
            <hr />
            <div class="alert alert-info text-center">
            Shelter Sedang Tidak Melayani Pengajuan Penyerahan Hewan Peliharaan
        </div>
        </div>
    </div>
</section>
@else
<section id="section-1-layanan-penyerahan">
    <div class="container">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Ajukan Penyerahan Hewan Peliharaan</h1>
            <hr />
            <div class="col">
                <div class="mt-2">
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
                    <label for="" class="my-2">Email</label>
                    <input type="text" name="emailPemilik" id="emailPemilik" class="form-control" value="{{$user->email}}" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Alamat</label>
                    <input type="text" name="alamatPemilik" id="alamatPemilik" class="form-control" value="{{$user->address}}" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Usia</label>
                    <input type="text" name="usia" id="usia" class="form-control" value="" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-2">Tanggal Lahir</label>
                    <input type="text" name="bod" id="bod" class="form-control" value="{{ $user->birth_date }}" disabled>
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
                    <label for="" class="my-2">Pekerjaan</label>
                    <input type="text" name="pekerjaanPemilik" id="pekerjaanPemilik" class="form-control" value="{{$user->job}}" disabled>
                </div>
            </div>
            <hr>
            <div class="row my-1">
                <div class="col my-2 d-flex flex-column justify-content-center">
                    <label for="" class="my-2">Unggah Foto Hewan Anda<sup class="text-danger">*<sup></label>
                    <input type="file" class="form-control" name="fotoHewanHandover" id="fotoHewan" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml" required>
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                    <small class="mt-2 text-danger" id="foto1-error"></small>
                </div>
            </div>
            <!-- Displaying the handover questions -->
            <div class="row my-1">
                <div class="col">
                    @foreach($handoverQuestions as $question)
                    <div class="col">
                        <label class="my-2">{{ $question->questions }}<sup class="text-danger">*<sup></label>
                        @switch($question->handover_questions_id)
                            @case(2)
                                <select class="form-control" name="answers[{{ $question->handover_questions_id }}]" placeholder="Masukan Jawaban Anda" required>
                                    <option value="" selected disabled>Pilih Jenis Hewan</option>
                                    <option value="Anjing">Anjing</option>
                                    <option value="Kucing">Kucing</option>
                                </select>
                                @break
                            @case(3)
                                <input type="date" class="form-control" name="answers[{{ $question->handover_questions_id }}]" id="tanggalLahir" max="{{ date('Y-m-d') }}"  placeholder="Masukan Jawaban Anda" required> <!-- Added ID for tanggal lahir -->
                                @break
                            @case(4)
                                <select class="form-control" name ="answers[{{ $question->handover_questions_id }}]" placeholder="Masukan Jawaban Anda" required>
                                    <option value="" selected disabled>Pilih Jenis Kelamin Hewan</option>
                                    <option value="Jantan">Jantan</option>
                                    <option value="Betina">Betina</option>
                                </select>
                                @break
                            @case(7)
                                <input type="number" class="form-control" name="answers[{{ $question->handover_questions_id }}]" step="0.01" min="0" placeholder="Masukan Jawaban Anda" required>
                                @break
                            @case(9)
                                <select class="form-control" name="answers[{{ $question->handover_questions_id }}]" placeholder="Masukan Jawaban Anda" required>
                                    <option value="" selected disabled>Pilih Sudah/Belum</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                                @break
                            @default
                                <textarea class="form-control" name="answers[{{ $question->handover_questions_id }}]" rows="3" placeholder="Masukan Jawaban Anda" required></textarea>
                        @endswitch
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row my-3">
                <div class="gap-3 my-10 d-flex justify-content-between">
                    <label for="" class="text-danger mt-2">Mohon isi semua kolom dengan <sup class="text-danger">*<sup></label>
                    <button class="btn btn-primary" type="submit" style="border: 0;" id="submitForm" disabled>Kirim Pengajuan</button>
                </div>
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
@if(session('error'))
    <script>
        Swal.fire({
            title: 'Gagal',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'Oke'
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
                cancelButtonText: 'Tidak, Kembali',
            }).then((result) => {
                if (result.isConfirmed) {
                    // If "Yes, submit it!" is clicked, submit the form
                    document.getElementById('formPenyerahan').submit();
                }
            });
    });
</script>

<script>
    $(document).ready(function() {
        // Function to check if any textarea or file input field is empty
        function checkEmptyFields() {
            let isEmpty = false;

            // Check for empty textareas
            $('textarea').each(function() {
                if ($(this).val().trim() === '') {
                    isEmpty = true;  // If any textarea is empty
                }
            });

            // Check for empty required file inputs
            $('input[type="file"][required]').each(function() {
                if ($(this).val() === '') {
                    isEmpty = true;  // If any required file input is empty
                }
            });

            // If there's an empty field, disable the submit button
            if (isEmpty) {
                $('#submitForm').attr('disabled', true);
            } else {
                $('#submitForm').attr('disabled', false); // Enable submit button if all fields are filled
            }
        }

        // Check empty fields on keyup in any textarea
        $('textarea').on('keyup', function() {
            checkEmptyFields();
        });

        // Check empty fields on change in any file input
        $('input[type="file"]').on('change', function() {
            checkEmptyFields();
        });

        // Run the check initially in case fields are already filled
        checkEmptyFields();
    });
</script>

<script>
    $(document).ready(function() {
        // Function to validate both file inputs
        function validateFiles() {
            const foto1 = $('#fotoHewan')[0].files[0];  // Get the first file (fotoHewan)
            const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/jpg'];
            let isValid = true;  // Flag to check if all files are valid

            // Check the first file (fotoHewan)
            if (foto1) {
                const fileType1 = foto1.type;
                if (!validImageTypes.includes(fileType1)) {
                    $('#foto1-error').text('Mohon unggah file gambar yang valid (JPG, PNG, GIF, SVG).');
                    isValid = false;  // Invalid file
                } else {
                    $('#foto1-error').text('');  // Clear error message if file is valid
                }
            }

            // Enable or disable submit button based on validation
            if (isValid) {
                $('#submitForm').prop('disabled', false);  // Enable submit button if all files are valid
            } else {
                $('#submitForm').prop('disabled', true);  // Disable submit button if any file is invalid
            }
        }

        // Event listener for file input changes
        $('#fotoHewan').on('change', function() {
            validateFiles();  // Validate the files when the user selects a file
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tanggalLahirInput = document.getElementById('bod');
    const usiaUser = document.getElementById('usia');

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

        usiaUser.value = ageString;
    }

    if (tanggalLahirInput.value) {
        calculateAge();
    }

    tanggalLahirInput.addEventListener('change', calculateAge);
});
</script>
@endsection