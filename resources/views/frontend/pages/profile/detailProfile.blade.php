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
        <h2>Profil Pengguna</h2>
        <hr />
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row my-3">
            <div class="col-5 d-flex justify-content-center">
                <img src="{{ asset('storage/profile/' . $user->photo) }}" alt="" style="width: 250px; height: 250px; object-fit: cover; border-radius: 50%;">
            </div>
            <div class="col-7 d-flex align-items-center">
                <div class="row">
                    <div class="col">
                        <p>Nama: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Alamat: {{ $user->address }}</p>
                    </div>
                    <div class="col">
                        <p>Nomor Telepon: {{ $user->phone_number }}</p>
                        <p>Nomor Telepon: {{ $user->whatsapp_number }}</p>
                        <p>Pekerjaan: {{ $user->job }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <a href="{{ route('edit-profil') }}" style="color: black">
                    <button class="btn btn-outline-secondary" style="width: 100%;"><span>Ubah Profil</span></button>
                </a>
            </div>
            <div class="col">
                <a href="{{ route('edit-password') }}" style="color: black">
                    <button class="btn btn-outline-secondary" style="width: 100%;"><span>Ubah Password</span></button>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection