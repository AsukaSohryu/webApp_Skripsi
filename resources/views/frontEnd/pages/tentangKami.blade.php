@extends('frontend.layout.layout')

@section('link')
<link rel="stylesheet" href="{{url('/')}}/assets/css/frontend/tentangKami/tentangKami.css">
@endsection

@section('content')
<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="hero" style="height: 72vh; background-image: url('{{ asset('assets/images/tentangKami/Cats_Dogs_1.jpg') }}'); background-position: center;">
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Tentang Kami</p>
    </div>
</section>

<section id="section-1-tentang" style="padding-bottom: 0;">
    <div class="container p-4 d-flex" style="background-color: #EFF8FF; border-radius: 8px;">
        <div class="row d-flex" id="row-1-tentang">
            <div class="col-lg-6 col-12 d-flex justify-content-center">
                <img src="{{ asset('uploadedImages/informasiShelter/' . $shelterInformation->founder_photo) }}" alt="Founder Photo" style="width: 400px; height: 400px; object-fit: cover; border-radius: 8px;">
            </div>
            <div class="col-lg-6 col-12 d-flex align-items-center">
                <div class="custom-text-box">
                    <h2 class="mb-2">Profil Pendiri</h2>
                    <p class="mb-0">{!! $shelterInformation->founder_description!!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="gambar-shelter">
    <div class="container">
        <img class="border border-black" src="{{ asset('uploadedImages/informasiShelter/' . $shelterInformation->shelter_photo) }}" alt="Shelter Photo" style="border-radius: 8px;">
    </div>
</section>

<section id="section-2-tentang" style="padding-bottom: 0; padding-top: 10px;">
    <div class="container g-3 p-4 align-items-center" style="background-color: #EFF8FF; border-radius: 8px;">
        <h3>Perjalanan Kisah <span style="color: #FF5E14">Kami</span></h3>
        <p class="text-center">{!! $shelterInformation->history !!}</p>
        <h3>Tentang Kami</h3>
        <p class="text-center">{!! $shelterInformation->about_shelter !!}</p>
        <div class="col p-3" style="background-color: white; border-radius: 8px;">
            <h3 class="text-center">Visi</h3>
            <div class="text-center">{!! $shelterInformation->vision !!}</div>
        </div>
        <div class="col p-3" style="background-color: white; border-radius: 8px;">
            <h3 class="text-center">Misi</h3>
            <div>{!! $shelterInformation->mission !!}</div>
        </div>
    </div>
</section>

<section id="section-3-tentang" style="padding-bottom: 0; padding-top: 10px;">
    <div class="container g-3 p-4" style="background-color: #EFF8FF; border-radius: 8px;">
        <div class="row d-flex" style="gap: 16px;">
            <div class="col d-flex flex-column justify-content-center" style="background-color: white; border-radius: 8px;">
                <h3>Jam Operasional</h3>
                <p>{!! $shelterInformation->operational_hour !!}</p>
            </div>
            <div class="col d-flex flex-column justify-content-start" style="background-color: white; border-radius: 8px;">
                <h3>Sosial Media</h3>
                <div class="d-flex flex-column" style="gap: 8px;">
                    <p class="m-0">{{ $shelterInformation->instagram }}</p>
                    <p class="m-0">{{ $shelterInformation->facebook }}</p>
                    <p class="m-0">{{ $shelterInformation->twitter }}</p>
                    <p class="m-0">{{ $shelterInformation->youtube }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-4-tentang" style="padding-bottom: 0; padding-top: 10px;">
    <div class="container g-3 p-4" style="background-color: #EFF8FF; border-radius: 8px;">
        <h3 class="text-center">Informasi Tambahan</h3>
        <div>{!! $shelterInformation->additional_information !!}</div>
    </div>
</section>

<section id="section-5-tentang" style="padding-bottom: 0; padding-top: 10px;">
    <div class="container g-3 p-4" style="background-color: #EFF8FF; border-radius: 8px;">
        <h3 class="text-center">Informasi Donasi</h3>
        <div>{!! $shelterInformation->donation_information !!}</div>
    </div>
</section>

{{-- <section class="section-padding section-bg" id="section-2">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                <img src="{{ asset('storage/shelterInformation/' . $shelterInformation->shelter_photo) }}" class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="Shelter Photo">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-12">
                <div class="custom-text-box">
                    <h2 class="mb-2">Tentang Kami</h2>
                    <p class="mb-0">{!! $shelterInformation->about_shelter !!}</p>
                </div>
            </div>
            <div class="col-lg-6 col-12" id="sejarah-desktop">
                <div class="custom-text-box">
                    <h2 class="mb-2">Sejarah Kami</h2>
                    <p class="mb-0">{!! $shelterInformation->history !!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="visi-misi-desktop">
        <div class="row mb-4">
            <div class="col-lg-6 col-12">
                <h2 class="mb-2">Visi</h2>
                {!! $shelterInformation->vision !!}
            </div>
            <div class="col-lg-6 col-12">
                <h2 class="mb-2">Misi</h2>
                {!! $shelterInformation->mission !!}
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-12">
                <h2 class="mb-2">Jam Operasional</h2>
                {!!$shelterInformation->operational_hour!!}
            </div>
            <div class="col-lg-6 col-12">
                <ul class="social-icon mt-4">
                    <li class="social-icon-item">
                        <a href="{{$shelterInformation->instagram}}" class="social-icon-link bi-instagram"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="{{$shelterInformation->facebook}}" class="social-icon-link bi-facebook"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="{{$shelterInformation->twitter}}" class="social-icon-link bi-twitter"></a>
                    </li>
                    <li class="social-icon-item">
                        <a href="{{$shelterInformation->youtube}}" class="social-icon-link bi-youtube"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section> --}}
@endsection

@section('js')

@endsection