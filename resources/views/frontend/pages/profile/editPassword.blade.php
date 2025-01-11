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
        <p class="type-2">Ubah Kata Sandi</p>
    </div>
</section>

<section id="detail-profile-desktop-1">
    <div class="container">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Ubah Kata Sandi</h1>
            <hr />
        </div>
        <form action="{{ route('edit-password.post') }}" method="POST" enctype="multipart/form-data" id="changePasswordForm" class="d-flex flex-column" style="gap: 16px;">
            <input type="hidden" name="id" value="{{ $user->user_id }}">
            @csrf
            <div>
                <label for="current_password" class="form-label my-3">Kata Sandi Saat Ini</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required />
            </div>
            <div>
                <label for="new_password" class="form-label my-3">Kata Sandi Baru</label>
                <input type="password" id="new_password" name="new_password" class="form-control" required />
            </div>
            <div>
                <label for="confirm_new_password" class="form-label my-3">Konfirmasi Kata Sandi Baru</label>
                <input type="password" id="confirm_new_password" name="new_password_confirmation" class="form-control" required />
            </div>
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('detail-profil') }}" class="btn btn-secondary border border-0">Batalkan</a>
                <button class="btn btn-success border-0" type="submit" id="submitForm">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')

@if (session('error'))
    <script>
        Swal.fire({
            title: 'Gagal',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'Oke'
        });
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    </script>
@endif

<script>
    // Validate passwords before submitting
    document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('confirm_new_password').value;

        // Check if new password matches confirmation
        if (newPassword !== confirmPassword) {
            e.preventDefault();
            // alert('Password baru dan konfirmasi password tidak cocok.');
            Swal.fire({
                title: 'Gagal',
                text: 'Password baru dan konfirmasi password tidak cocok.',
                icon: 'error',
                confirmButtonText: 'Oke'
            });
            return;
        }

        // Check password length
        if (newPassword.length < 8) {
            e.preventDefault();
            Swal.fire({
                title: 'Gagal',
                text: 'Password baru harus memiliki setidaknya 8 karakter.',
                icon: 'error',
                confirmButtonText: 'Oke'
            });
            // alert('Password baru harus memiliki setidaknya 8 karakter.');
            return;
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
                    document.getElementById('changePasswordForm').submit();
                }
            });
    });
</script>

<script>
    $(document).ready(function() {
        // Function to check if all fields are filled and the passwords match
        function checkEmptyFields() {
            let isEmpty = false;

            // Check for empty fields (current password, new password, confirm password)
            $('input[type="password"]').each(function() {
                if ($(this).val().trim() === '') {
                    isEmpty = true;  // If any password field is empty
                }
            });

            // Check if new password and confirm password match
            const newPassword = $('#new_password').val();
            const confirmPassword = $('#confirm_new_password').val();
            if (newPassword !== confirmPassword) {
                isEmpty = true;  // If passwords do not match
            }

            // If there's an empty field or passwords don't match, disable the submit button
            if (isEmpty) {
                $('#submitForm').attr('disabled', true);
            } else {
                $('#submitForm').attr('disabled', false); // Enable submit button if all fields are filled and passwords match
            }
        }

        // Check empty fields and password match on input change
        $('input[type="password"]').on('input', function() {
            checkEmptyFields();
        });

        // Run the check initially in case fields are already filled
        checkEmptyFields();
    });
</script>
@endsection