@extends('frontend.layout.layout')

@section('link')

@endsection

@section('content')
<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="hero" style='height: 72vh; background-image: url("./assets/images/tentangKami/1148760.jpg"); background-position: center;'>
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Tentang Kami</p>
    </div>
</section>

<section id="section-1-tentang">
    <div class="container" style="background-color: #EFF8FF;">
        <div class="row">
            <section class="about-section section-padding">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-lg-6 col-md-5 col-12">
                            <img src="{{ asset('storage/shelterInformation/' . $shelterInformation->founder_photo) }}" class="about-image ms-lg-auto bg-light shadow-lg img-fluid" alt="Shelter Photo">
                        </div>
                        <div class="col-lg-5 col-md-7 col-12">
                            <div class="custom-text-block">
                                <h2 class="mb-0">{{$shelterInformation->founder_name}}</h2>

                                <p class="text-muted mb-lg-4 mb-md-4">Pendiri Shelter</p>

                                <p>{{$shelterInformation->founder_description}}</p>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<section class="section-padding section-bg" id="section_2">
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
                    <p class="mb-0">{{$shelterInformation->about_shelter}}</p>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="custom-text-box">
                    <h2 class="mb-2">Sejarah Kami</h2>
                    <p class="mb-0">{{$shelterInformation->history}}</p>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-12">
                <h2 class="mb-2">Visi</h2>
                {{$shelterInformation->vision}}
            </div>
            <div class="col-lg-6 col-12">
                <h2 class="mb-2">Misi</h2>
                {{$shelterInformation->mission}}
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-6 col-12">
                {{-- {{$shelterInformation->operational_hour}} --}}
                loooooooooo ooooooooooooooo ooooooooooo ooooooorem mmmm mmmmmmm mmmmmm mmmmmmm m mmmmmmmmmm mipppppp pppppp ppssssssssss summmmmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmmmmmm
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
</section>
@endsection

@section('js')

@endsection