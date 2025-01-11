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
    </div>
</section>

<section id="detail-profile-desktop-1">
    <div class="container" style="gap: 8px;">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Detail Profil</h1>
            <hr />
        </div>
        <div class="row my-3">
            <div class="col-4 d-flex justify-content-center">
                <img src="{{ asset('uploadedImages/userProfile/' . $user->photo) }}" alt="" style="width: 250px; height: 250px; object-fit: cover; border-radius: 50%;">
            </div>
            <div class="col-8">
                <div class="row my-3">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" disabled>
                </div>
                <div class="row my-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" name="email" disabled>
                </div>
                <div class="row my-3">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" value="{{ $user->address }}" name="address" disabled>
                </div>
                <div class="row my-3">
                    <label for="">Tanggal Lahir</label>
                    <input type="text" class="form-control" value="{{ $user->birth_date }}" name="address" disabled>
                </div>
                <div class="row my-3">
                    <label for="">Nomor Whatsapp</label>
                    <input type="text" class="form-control" value="{{ $user->whatsapp_number }}" name="whatsapp_number" disabled>
                </div>
                <div class="row my-3">
                    <label for="">Nomor Telepon</label>
                    <input type="text" class="form-control" value="{{ $user->phone_number }}" name="phone_number" disabled>
                </div>
                <div class="row my-3">
                    <label for="">Pekerjaan</label>
                    <input type="text" class="form-control" value="{{ $user->job }}" name="job" disabled>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <a href="{{ route('edit-profil') }}" style="color: black">
                    <button class="btn btn-success border-0" style="width: 100%;"><span>Ubah Profil</span></button>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('edit-password') }}" style="color: black" aria-disabled="true">
                    <button class="btn btn-outline-secondary" style="width: 100%;"><span>Ubah kata Sandi</span></button>
                </a>
            </div>
        </div>
    </div>
</section>
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
@endsection

@section('js')

@endsection