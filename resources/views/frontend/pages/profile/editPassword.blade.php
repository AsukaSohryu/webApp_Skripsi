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
        <p class="type-2">Ubah Password</p>
    </div>
</section>

<section id="detail-profile-desktop-1">
    <div class="container">
        <h2>Ubah Password</h2>
        <hr />
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('edit-password.post') }}" method="POST" enctype="multipart/form-data" id="changePasswordForm" class="d-flex flex-column" style="gap: 16px;">
            <input type="hidden" name="id" value="{{ $user->user_id }}">
            @csrf
            <div>
                <label for="current_password" class="form-label my-3">Password Saat Ini</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required />
            </div>
            <div>
                <label for="new_password" class="form-label my-3">Password Baru</label>
                <input type="password" id="new_password" name="new_password" class="form-control" required />
            </div>
            <div>
                <label for="confirm_new_password" class="form-label my-3">Konfirmasi Password Baru</label>
                <input type="password" id="confirm_new_password" name="new_password_confirmation" class="form-control" required />
            </div>
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('detail-profil') }}" class="btn btn-outline-danger">Batalkan</a>
                <button class="btn btn-outline-secondary" type="submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</section>

<script>
    // Validate passwords before submitting
    document.getElementById('changePasswordForm').addEventListener('submit', function (e) {
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('confirm_new_password').value;

        // Check if new password matches confirmation
        if (newPassword !== confirmPassword) {
            e.preventDefault();
            alert('Password baru dan konfirmasi password tidak cocok.');
            return;
        }

        // Check password length
        if (newPassword.length < 8) {
            e.preventDefault();
            alert('Password baru harus memiliki setidaknya 8 karakter.');
            return;
        }
    });
</script>
@endsection

@section('js')

@endsection