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

{{-- <section id="hero" style="height: 72vh; background-image: url('{{ asset('assets/images/layananKami/Stray_pets_1.jpg') }}'); background-position: center;">
</section> --}}

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Laporkan Penemuan Hewan Peliharaan Liar</p>
    </div> 
</section>

@if($shelterInformation->is_accepting_report == 0)
<section id="section-1-laporan-penemuan">
    <div class="container">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Laporkan Penemuan Hewan Peliharaan Liar</h1>
            <hr />
            <div class="alert alert-info text-center">
            Shelter Sedang Tidak Melayani Laporkan Penemuan Hewan Peliharaan Liar
        </div>
        </div>
    </div>
</section>
@else
<section id="section-1-laporan-penemuan">
    <div class="container">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Laporkan Penemuan Hewan Peliharaan Liar</h1>
            <hr />
            <div class="col">
                <div class="mt-2">
                    {!! $shelterInformation->report_information !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container border border-black my-2" style="border-radius: 16px">
        <form action="{{ route('layanan-laporan-post') }}" method="POST" class="m-4" enctype="multipart/form-data" id="formLaporan">
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
            <div class="row my-2">
                <div class="col">
                    <label for="" class="my-2">Jenis Hewan<sup class="text-danger">*<sup></label>
                    <select name="jenisHewan" id="jenisHewan" class="form-select" required>
                        <option value="" selected disabled>Pilih Jenis Hewan</option>
                        <option value="Anjing">Anjing</option>
                        <option value="Kucing" >Kucing</option>
                    </select>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Lokasi (Deskripsi, Patokan)<sup class="text-danger">*<sup></label>
                    <input type="text" name="lokasi" id="lokasi" value="" placeholder="Lokasi (Deskripsi, Patokan)" class="form-control" required>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Lokasi Google Maps<sup class="text-danger">*<sup></label>
                    <input type="url" name="lokasiMaps" id="lokasiMaps" value="" placeholder="Lokasi Google Maps" class="form-control" required>
                    <span class="mt-2 text-danger" id="lokasiMaps-error"></span>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Deskripsi<sup class="text-danger">*<sup></label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Deskripsi hewan, kondisi hewan, tempat/lokasi, dan penjelasan yang dapat membantu, Hari/Tanggal dan waktu ditemukan" required></textarea>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Unggah Foto Hewan<sup class="text-danger">*<sup></label>
                    <input type="file" name="fotoHewan" id="fotoHewan" class="form-control" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml" required>
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                    <small class="mt-2 text-danger" id="foto1-error"></small>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Unggah Foto Lokasi Penemuan<sup class="text-danger">*<sup></label>
                    <input type="file" name="fotoLokasi" id="fotoLokasi" class="form-control" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml" required>
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                    <small class="mt-2 text-danger" id="foto2-error"></small>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Unggah Foto Pendukung</label>
                    <input type="file" name="fotoBebas" id="fotoBebas" class="form-control" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml">
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                    <span class="mt-2 text-danger" id="foto3-error"></span>
                </div>
            </div>
            <div class="gap-3 my-10 d-flex justify-content-between">
                <label for="" class="text-danger mt-2">Mohon isi semua kolom dengan <sup class="text-danger">*<sup></label>
                <button class="btn btn-primary" type="submit" style="border: 0;" id="submitForm" disabled>Kirim Laporan</button>
            </div>
        </form>
    </div>
</section>
@endif

@if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Oke'
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
@endsection

@section('js')
<script>
$(document).ready(function () {
    function validateGoogleMapsLink() {
        let mapsInput = $('#lokasiMaps').val().trim();
        let submitButton = $('#submitForm');
        let errorMessage = $('#lokasiMaps-error');

        // Regular Expression for Google Maps URL (now includes 'maps.app.goo.gl' short links)
        let googleMapsPattern = /^(https?:\/\/)?(www\.)?(google\.[a-z]{2,}|goo\.gl|maps\.app\.goo\.gl)\/(maps|maps\/place|search|dir\/|)(\?q=|@|\/data=|\/place\/)?/i;

        if (mapsInput === '') {
            errorMessage.text(''); // No error message when empty
            submitButton.prop('disabled', true);
            return false;
        }

        if (!googleMapsPattern.test(mapsInput)) {
            errorMessage.text('Masukkan tautan Google Maps yang valid.');
            submitButton.prop('disabled', true);
            return false;
        }

        errorMessage.text(''); // Clear error message
        submitButton.prop('disabled', false);
        return true;
    }

    // Validate on input change
    $('#lokasiMaps').on('input', function () {
        validateGoogleMapsLink();
    });

    // Run validation on page load in case input has pre-filled value
    validateGoogleMapsLink();
});

</script>

<script>
$(document).ready(function () {
    function checkEmptyFields() {
        let allFilled = true; // Assume all required fields are filled

        // Check for empty textareas
        $('textarea[required]').each(function () {
            if ($(this).val().trim() === '') {
                allFilled = false;
                return false; // Stop checking further
            }
        });

        // Check for empty required file inputs
        $('input[type="file"][required]').each(function () {
            if (this.files.length === 0) { // Check if a file is selected
                allFilled = false;
                return false; // Stop checking further
            }
        });

        // Enable submit button only if ALL required fields are filled
        $('#submitForm').prop('disabled', !allFilled);
    }

    // Check fields on input events
    $('textarea[required]').on('input', function () {
        checkEmptyFields();
    });

    // Check fields on file selection or removal
    $('input[type="file"][required]').on('change', function () {
        checkEmptyFields();
    });

    // Run initial check in case some fields are pre-filled
    checkEmptyFields();
});

</script>

<script>
    $(document).ready(function() {
        // Function to validate both file inputs
        function validateFiles() {
            const foto1 = $('#fotoHewan')[0].files[0];  // Get the first file (fotoLokasi)
            const foto2 = $('#fotoLokasi')[0].files[0];  // Get the second file (fotoHewan)
            const foto3 = $('#fotoBebas')[0].files[0];  // Get the third file (fotoBebas)
            
            const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/jpg'];
            let isValid = true;  // Flag to check if all files are valid

            // Check the first file (fotoLokasi)
            if (foto1) {
                const fileType1 = foto1.type;
                if (!validImageTypes.includes(fileType1)) {
                    $('#foto1-error').text('Mohon unggah file gambar yang valid (JPG, PNG, GIF, SVG).');
                    isValid = false;  // Invalid file
                } else {
                    $('#foto1-error').text('');  // Clear error message
                }
            }

            // Check the second file (fotoHewan)
            if (foto2) {
                const fileType2 = foto2.type;
                if (!validImageTypes.includes(fileType2)) {
                    $('#foto2-error').text('Mohon unggah file gambar yang valid (JPG, PNG, GIF, SVG).');
                    isValid = false;  // Invalid file
                } else {
                    $('#foto2-error').text('');  // Clear error message
                }
            }

            // Check the third file (fotoBebas)
            if (foto3) {
                const fileType3 = foto3.type;
                if (!validImageTypes.includes(fileType3)) {
                    $('#foto3-error').text('Mohon unggah file gambar yang valid (JPG, PNG, GIF, SVG).');
                    isValid = false;  // Invalid file
                } else {
                    $('#foto3-error').text('');  // Clear error message
                }
            }

            // Enable or disable submit button based on validation
            if (isValid) {
                $('#submitForm').prop('disabled', false);  // Enable submit button if all files are valid
            } else {
                $('#submitForm').prop('disabled', true);  // Disable submit button if any file is invalid
            }
        }

        // Event listeners to validate files when they change
        $('#fotoLokasi').on('change', function() {
            validateFiles();  // Validate the files when the user selects a file
        });

        $('#fotoHewan').on('change', function() {
            validateFiles();  // Validate the files when the user selects a file
        });

        $('#fotoBebas').on('change', function() {
            validateFiles();  // Validate the files when the user selects a file
        });
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
                    document.getElementById('formLaporan').submit();
                }
            });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tanggalLahirInput = document.getElementById('bod');
    const usiaUser = document.getElementById('usia');
    console.log(usiaUser);

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