@extends('frontend.layout.layout')

@section('link')

@endsection

@section('content')
<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="hero" style='height: 72vh; background-image: url("./assets/images/tentangKami/owl.jpg"); background-position: center;'>
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Tentang Kami</p>
    </div>
</section>

<section id="section-1-tentang" style="padding-bottom: 0;">
    <div class="container p-4" style="background-color: #EFF8FF; border-radius: 8px;">
        <div class="row">
            <div class="col-lg-6 col-12">
                <img src="{{ asset('storage/shelterInformation/' . $shelterInformation->founder_photo) }}" class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="Founder Photo" style="max-width: 200px;">
            </div>
            <div class="col-lg-6 col-12">
                <div class="custom-text-box">
                    <h2 class="mb-2">Profil Pendiri</h2>
                    <p class="mb-0">{!! $shelterInformation->founder_description!!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-2-tentang">
    <div class="container g-3 p-4 align-items-center" style="background-color: #EFF8FF; border-radius: 8px;">
        <h3>Perjalanan Kisah <span style="color: #FF5E14">Kami</span></h3>
        <p class="text-center">{!! $shelterInformation->history !!}</p>
        <h3>Tentang Kami</h3>
        <p class="text-center">{!! $shelterInformation->about_shelter !!}</p>
        <div class="col p-3" style="background-color: white; border-radius: 8px;">
            <h3 class="text-center">Visi</h3>
            <p class="text-center">{!! $shelterInformation->vision !!}</p>
        </div>
        <div class="col p-3" style="background-color: white; border-radius: 8px;">
            <h3 class="text-center">Misi</h3>
            <p class="text-center">{!! $shelterInformation->mission !!}</p>
        </div>
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