@extends('frontend.layout.layout')

@section('link')

@endsection

@section('content')
<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Profil</p>
        <p class="type-2">{{ $user->name }}</p>
        <p class="type-2">Edit Profile</p>
    </div>
</section>

<section id="detail-profile-desktop-1">
    <div class="container">
        <h2 class="text-center">Ubah Profil</h2>
        <hr />
        <form action="{{ route('edit-profil.post') }}" method="POST" enctype="multipart/form-data" id="formDetailProfile">
            <input type="hidden" name="id" value="{{ $user->user_id }}">
            @csrf
            <div class="row my-3">
                <div class="col-4 d-flex align-items-center flex-column">
                    <img src="{{ asset('storage/profile/' . $user->photo) }}" alt="" style="width: 250px; height: 250px; object-fit: cover; border-radius: 50%;">
                    <input type="file" class="form-control my-3" name="photo">
                    <p>Current File: {{ $user->photo }}</p>
                </div>
                <div class="col-8">
                    <div class="row my-3">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                    </div>
                    <div class="row my-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" name="email">
                    </div>
                    <div class="row my-3">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" value="{{ $user->address }}" name="address">
                    </div>
                    <div class="row my-3">
                        <label for="">Nomor Whatsapp</label>
                        <input type="text" class="form-control" value="{{ $user->whatsapp_number }}" name="whatsapp_number">
                    </div>
                    <div class="row my-3">
                        <label for="">Nomor Telepon</label>
                        <input type="text" class="form-control" value="{{ $user->phone_number }}" name="phone_number">
                    </div>
                    <div class="row my-3">
                        <label for="">Pekerjaan</label>
                        <input type="text" class="form-control" value="{{ $user->job }}" name="job">
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('detail-profil') }}" class="btn btn-secondary">Batalkan</a>
                <button class="btn btn-success border-0" type="submit" id="submitForm">Simpan Perubahan</button>
            </div>
            
        </form>
    </div>
</section>
@endsection

@section('js')
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
                    document.getElementById('formDetailProfile').submit();
                }
            });
    });
</script>

<script>
    $(document).ready(function() {
        // Function to check if all form fields are filled
        function checkEmptyFields() {
            let isEmpty = false;

            // Loop through all input fields to check if any is empty
            $('input[type="text"], input[type="email"]').each(function() {
                if ($(this).val().trim() === '') {
                    isEmpty = true;  // If any field is empty
                }
            });

            // If there is any empty field, disable the submit button
            if (isEmpty) {
                $('#submitForm').attr('disabled', true);
            } else {
                $('#submitForm').attr('disabled', false); // Enable the button if all fields are filled
            }
        }

        // Check if fields are filled whenever any input changes
        $('input[type="text"], input[type="email"]').on('keyup', function() {
            checkEmptyFields();
        });

        // Initial check for the page load to set the correct state of the button
        checkEmptyFields();  // This will enable the button if all fields have values when the page loads
    });
</script>
@endsection