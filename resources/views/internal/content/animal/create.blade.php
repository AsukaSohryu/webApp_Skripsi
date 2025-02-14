@extends('internal.layout.dashboard')

@section('content')

<style>
    .button{
        background-color: #d2d2d2;
        width: 60px;
        height: 30px;
        border-radius: 200px;
        cursor: pointer;
        position: relative;
        transition: 0.2s;
    }
    .button::before{
        position: absolute;
        content: '';
        background-color: #fff;
        width: 20px;
        height: 20px;
        border-radius: 200px;
        margin: 5px;
        transition: 0.2s;
    }

    input:checked + .button{
        background-color: #2D68FE;
    }
    input:checked + .button::before{
        transform: translateX(30px);
    }

    input{
        display: none;
    }
    .custom-dropdown {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg"><polyline points="30,50 70,90 110,50" stroke="black" stroke-width="10" fill="none"/></svg>') no-repeat right center;
        background-size: 20px; /* Add padding to make room for the arrow */
        background-position: calc(100% - 10px) center; /* Adjust the position here */
        padding-right: 40px;
        width: calc(100% - 0px);
        box-sizing: border-box;
    }
</style>

<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <h1 class="text-center">Isi Data Hewan</h1>
        <form action="{{ route('dataHewan.create.post') }}" method="post" enctype="multipart/form-data" id="createAnimal">
            @csrf
            <div class="row my-3">
                <div class="col my-3 d-flex flex-column justify-content-center">
                    <label for="" class="my-3">Upload Foto Hewan</label>
                    <input type="file" class="form-control" name="fotoHewan" id="fotoHewan" required accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml">
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                    <small class="mt-2 text-danger" id="foto1-error"></small>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">ID Hewan</label>
                    <input type="text" value="-" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-3">Nama Hewan</label>
                    <input type="text" name="namaHewan" id="namaHewan" value="" placeholder="Nama Hewan" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Jenis Hewan</label>
                    <select name="jenisHewan" id="jenisHewan" class="form-select" required>
                        <option value="" selected disabled>Jenis Hewan</option>
                        <option value="Anjing">Anjing</option>
                        <option value="Kucing" >Kucing</option>
                    </select>
                </div>
                <div class="col">
                    <label for="" class="my-3">Status Hewan</label>
                    <select class="form-control custom-dropdown" id="statusID" name="statusID" required>
                        @foreach($status as $s)
                            <option value="{{ $s->status_id }}">
                                {{ $s->status }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Detail Status Hewan</label>
                    <textarea type="text" name="detailStatusHewan" id="detailStatusHewan" value="" placeholder="Detail Status Hewan" class="form-control" required></textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Usia Hewan</label>
                    <input type="text" name="usiaHewan" id="usiaHewan" value="" placeholder="Usia Hewan" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-3">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" value="" class="form-control" max="{{ date('Y-m-d') }}" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Jenis Kelamin</label>
                    <select name="jenisKelamin" id="jenisKelamin" class="form-select" required>
                        <option value="" selected disabled>Jenis Kelamin</option>
                        <option value="Jantan">Jantan</option>
                        <option value="Betina" >Betina</option>
                    </select>
                </div>
                <div class="col">
                    <label for="" class="my-3">Ras Hewan</label>
                    <input type="text" name="rasHewan" id="rasHewan" value="" placeholder="Ras Hewan" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Warna Hewan</label>
                    <input type="text" name="warnaHewan" id="warnaHewan" value="" placeholder="Warna Hewan" class="form-control" required>
                </div>
                <div class="col">
                    <label for="" class="my-3">Berat Hewan (Kg)</label>
                    <input type="number" name="beratHewan" id="beratHewan" value="" placeholder="Berat Hewan" class="form-control" step="0.01" min="0" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Informasi Vaksin Hewan</label>
                    <input type="text" name="informasiVaksin" id="informasiVaksin" value=""  placeholder="Informasi Vaksin Hewan" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Hewan Sudah Disteril</label>
                    <select class="form-control custom-dropdown" id="sterile" name="sterile" required>
                        <option value="" selected disabled>Hewan Sudah Disteril</option>
                        <option value="1">Sudah</option>
                        <option value="0" >Belum</option>
                    </select>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Asal Hewan</label>
                    <input type="text" name="asalHewan" id="asalHewan" value="" placeholder="Asal Hewan" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Karakteristik Hewan</label>
                    <textarea type="text" name="karakteristikHewan" id="karakteristikHewan" value="" placeholder="Karakterisitk Hewan" class="form-control" required></textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Deskripsi Hewan</label>
                    <textarea type="text" name="deskripsiHewan" id="deskripsiHewan" value="" placeholder="Deskripsi Hewan" class="form-control" required></textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Catatan Medis Hewan</label>
                    <textarea type="text" name="catatanMedisHewan" id="catatanMedisHewan" value="" placeholder="Catatan Medis Hewan" class="form-control" required></textarea>
                </div>
            </div>

            <div class="row my-3 p-3">
                <div class="d-flex flex-row justify-content-between p-3" style="background-color: #CADFF2; border-radius: .475rem;">
                    <div class="col d-flex align-items-center">
                        <label for=""><b>Pengaturan data hewan aktif atau tidak</b></label>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <input type="hidden" name="activeStatus" value="0">
                        <input 
                        type="checkbox" 
                        id="check" 
                        name="activeStatus"
                        value="1">
                        <label for="check" class="button"></label>
                        <label for="" class="ps-3" id="isActive">
                            <b>Tidak Aktif</b>
                        </label>
                    </div>
                </div>
            </div>

            <div class="gap-3 my-10 d-flex justify-content-end">
                <a href="{{ route('dataHewan.index') }}"
                   class="btn btn-secondary" 
                   style="border: 0;">
                     Batalkan
                </a>
                <button class="btn btn-primary" type="submit" style="border: 0;" id="submitForm">Tambah Hewan</button>
            </div>
        </form>
    </div>
</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Show the modal
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    });
</script>
@endif

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Show the modal
        const successModal = new bootstrap.Modal(document.getElementById('errorModal'));
        successModal.show();
    });
</script>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    const checkbox = document.getElementById('check');
    const statusLabel = document.getElementById('isActive');


    checkbox.addEventListener('change', function() {
        checkbox.value = this.checked ? "1" : "0";
        statusLabel.innerHTML = this.checked ? '<b>Aktif</b>' : '<b>Tidak Aktif</b>';
        console.log(checkbox, statusLabel);

    });
});
</script>
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

        usiaHewanInput.value = ageString;
    }

    if (tanggalLahirInput.value) {
        calculateAge();
    }

    tanggalLahirInput.addEventListener('change', calculateAge);
});
</script>
<script>
    $(document).ready(function() {
        // Function to check if any required fields are empty
        function checkEmptyFields() {
            let isEmpty = false;

            // Check for empty textareas
            $('textarea').each(function() {
                if ($(this).val().trim() === '') {
                    isEmpty = true;  // If any textarea is empty
                }
            });

            // Check for empty required text inputs
            $('input[type="text"][required], input[type="date"][required], input[type="number"][required]').each(function() {
                if ($(this).val().trim() === '') {
                    isEmpty = true;  // If any text input is empty
                }
            });

            // Check for empty required file inputs
            $('input[type="file"][required]').each(function() {
                if ($(this).val() === '') {
                    isEmpty = true;  // If any required file input is empty
                }
            });

            // If there's an empty field or checkbox is unchecked, disable the submit button
            if (isEmpty) {
                $('#submitForm').attr('disabled', true);
            } else {
                $('#submitForm').attr('disabled', false); // Enable submit button if all fields are filled
            }
        }

        // Check empty fields on keyup in any textarea, text input, and date input
        $('textarea, input[type="text"], input[type="date"], input[type="number"]').on('keyup change', function() {
            checkEmptyFields();
        });

        // Check empty fields when file input changes
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
            title: 'Apakah Anda Yakin Ingin Menambahkan Data Hewan Ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Lanjutkan',
            cancelButtonText: 'Tidak, Kembali',
        }).then((result) => {
            if (result.isConfirmed) {
                // If "Yes, submit it!" is clicked, submit the form
                document.getElementById('createAnimal').submit();
            }
        });
    });
</script>

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
@endsection