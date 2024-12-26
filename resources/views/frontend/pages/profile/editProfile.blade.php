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
        <h2>Ubah Profil</h2>
        <hr />
        <form action="{{ route('edit-profil.post') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $user->user_id }}">
            @csrf
            <div class="row my-3">
                <div class="col-4">
                    <img src="" alt="">
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
            <button class="btn btn-outline-secondary" type="submit" style="width: 100%;">Simpan Perubahan</button>
        </form>
    </div>
</section>
@endsection

@section('js')

@endsection