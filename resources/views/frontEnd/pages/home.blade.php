@extends('frontend.layout.layout')

@section('link')
<link rel="stylesheet" href="{{url('/')}}/assets/css/frontend/home/home.css">
@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" style="position: relative; height: 100vh;">

    {{-- @foreach ($banner as $b) --}}
    {{-- <img src="{{ asset('assets/images/home/hero/kumaBear.jpg') }}" alt="" class="image  home-image">
    <img src="{{ asset('assets/images/home/hero/iguana.jpg') }}" alt="" class="image  home-image">
    <img src="{{ asset('assets/images/home/hero/elephant.jpg') }}" alt="" class="image  home-image"> --}}
    <img src="{{ asset('assets/images/home/hero/Cats_Dogs_3.jpg') }}" alt="" class="image  home-image">
    {{-- @endforeach --}}
    
    <div class="home-carousel">
        <div class="detail">
            <div class="button">
                <button class="previous-button"><i class="fa-solid fa-chevron-left fa-lg"></i></button>
            </div>
            <div class="slide">
                {{-- biarkan kosong saja --}}
            </div>
            <div class="button">
                <button class="next-button"><i class="fa-solid fa-chevron-right fa-lg"></i></button>
            </div>         
        </div>
    </div>
</section>

<section id="home-1-desktop">
    <div class="container">
        <h3 class="text-center">Layanan Kami</h3>
        <div class="row">
            <div class="col">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <a href="{{ route('layanan-hewan-diselamatkan') }}" class="text-decoration-none" style="color: inherit;">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('assets/images/home/1-desktop/Home_RescuedAnimal.png') }}" class="card-img-top p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Lihat Hewan Yang Baru Diselamatkan</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12">
                <a href="{{ route('layanan-laporan') }}" class="text-decoration-none" style="color: inherit;">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('assets/images/home/1-desktop/Home_Report.png') }}" class="card-img-top p-4" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Laporan Penemuan Hewan Liar</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <a href="{{ route('layanan-pengajuan') }}" class="text-decoration-none" style="color: inherit;">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('assets/images/home/1-desktop/Home_Adoption.png') }}" class="card-img-top p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Ajukan Pengadopsian Hewan</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <a href="{{ route('layanan-lihat') }}" class="text-decoration-none" style="color: inherit;">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('assets/images/home/1-desktop/Home_Handover.png') }}" class="card-img-top p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">Ajukan Penyerahan Hewan</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function () {

        if (jQuery(window).width() > 769) {
            count = $(".home-image").length     
            image = $(".home-image")
            

            current = image.index($(".image-active"))
            activate(current)
            for(i = 0; i < count; i++){
                output = '<button class="slide-button"></button>';
                $(".slide").append(output);
            }
            $(".slide-button").eq(current).addClass("slide-active");
            slide = $(".slide-button")


            function activate(current){
                $(".image-active").removeClass("image-active");
                $(".home-image").eq(current).addClass("image-active");
                $(".slide-active").removeClass("slide-active");
                $(".slide-button").eq(current).addClass("slide-active");

                header = $(".image-active").eq(current).data('header')
                subheader = $(".image-active").eq(current).data('subheader')
                if(header!=null){
                    $('.home-header').text(header);
                }else{
                    $('.home-header').text("")
                }
                if(subheader!=null){
                    $('.home-sub-header').text(subheader);
                }else{
                    $('.home-sub-header').text("")
                }

                console.log(header);
            }

            $(".next-button").click(function (e) { 
                e.preventDefault();
                if(current == count - 1){
                    current = 0
                    activate(current)
                }else{
                    current = current + 1;
                    activate(current)
                }
            });
            $(".previous-button").click(function (e) { 
                e.preventDefault();
                if(current == 0){
                    current = count - 1
                    console.log(current)
                    activate(current)
                }else{
                    current = current - 1;
                    activate(current)
                }
            });
            $(".slide-button").click(function (e) { 
                e.preventDefault();
                current = slide.index(this)
                activate(current)
            });

            function nextslide(){
                if(current == count - 1){
                    current = 0
                    activate(current)
                }else{
                    current = current + 1;
                    activate(current)
                }
            }
            setInterval(function(){
                nextslide();
            }, 7000);
        }
    });
</script>
@endsection