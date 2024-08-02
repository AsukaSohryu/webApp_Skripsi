<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>{{ $pageTitle ?? '' }} | Shelter Us</title>
    @yield('meta')

    <!-- Favicons -->
    <link href="" rel="icon">
    <!-- <link href="{{url('/')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Calibri:400,700,400italic,700italic" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{url('/')}}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{url('/')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">   
    <link href="{{url('/')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>


    <!-- Template Main CSS File -->
    <link href="{{url('/')}}/assets/css/style.css" rel="stylesheet">
    <link href="{{url('/')}}/assets/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('link')
</head>

    <body id="body-content">
    @include('layout.navbar')
    
    @yield('content')

    @include('layout.footer')

    
    <a id="whatsapp" style="position: fixed;bottom: 20px;right: 20px;display:flex;flex-direction:row;align-items:center;z-index:1000"
        href="https://api.whatsapp.com/send?phone=6281295463027&text=Halo+IDL+Express+saya+ingin+informasi+lebih+lanjut+mengenai+jasa+ekspedisi+ke+" target="_blank">
        <div class="box" style="width: 72px;height:70px;border-radius:24px 24px 0px 24px;background: linear-gradient(180deg, #121C45 -22.77%, #FF5E14 251.91%);padding:12px">
            <img src="{{url('/')}}/assets/icon/whatsapp2.png" alt="" style="height: 100%;width:100%">
        </div>
    </a>

    <!-- <div id="preloader"></div> -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="position: fixed; bottom: 110px;"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{url('/')}}/assets/vendor/aos/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{url('/')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{url('/')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{url('/')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{url('/')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="{{url('/')}}/assets/vendor/php-email-form/validate.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <!-- Template Main JS File -->
    <!-- <script src="{{url('/')}}/assets/js/main.js"></script> -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://kit.fontawesome.com/95a745a1a3.js" crossorigin="anonymous"></script>
    @yield('js')
    </body>

</html>