<!-- ======= Header ======= -->
<header id="desktop-header" class="fixed-top">
    <div class="container d-flex justify-content-center align-items-center">
      <nav id="navbar" class="navbar d-flex">
        <ul>
            <a href="{{ route('home') }}" class="logo"><img src="{{url('/')}}/assets/img/main_logo.png" alt="" class="img-fluid"></a>
            <li>
              <a href="{{ route('home') }}"><span style="font-size:16px;">Home</span></a>
            </li>
            <li>
              <a href="{{ route('tentang-kami') }}"><span style="font-size:16px;">Tentang Kami</span></a>
            </li>
            <li class="dropdown"><a href="#"><span style="font-size:16px;">Layanan Kami</span><i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{ route('layanan-hewan-diselamatkan') }}"><span style="font-size:16px;">Lihat daftar hewan yang diselamatkan</span> </a></li>
                <li><a href="{{ route('layanan-laporan') }}"><span style="font-size:16px;">Laporkan Penemuan Hewan Liar</span> </a></li>
                <li><a href="{{ route('layanan-pengajuan') }}"><span style="font-size:16px;">Ajukan Penyerahan Hewan</span> </a></li>
                <li><a href="{{ route('layanan-lihat') }}"><span style="font-size:16px;">Ajukan Pengadopsian hewan / Lihat Daftar Hewan</span></a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#"><span style="font-size:16px;">Laporan dan Pengajuan</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{ route('status-laporan') }}"><span style="font-size:16px;">Status Laporan Penemuan Hewan Hilang</span></a></li>
                <li><a href="{{ route('status-penyerahan') }}"><span style="font-size:16px;">Status Pengajuan Penyerahan Hewan</span></a></li>
                <li><a href="{{ route('status-adopsi') }}"><span style="font-size:16px;">Status Pengajuan Pengadopsian Hewan</span></a></li>
              </ul>
            </li>
            <li>
            @if(auth()->check())
              <li class="dropdown">
                <a href="#" class="d-flex flex-row">
                  <span style="font-size:16px;">Hai, {{ auth()->user()->name }}!</span>
                  <img src="{{ asset('storage/profile/' . auth()->user()->photo) }}" alt="" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #ffffff; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
                </a>
                <ul>
                  <li><a href="{{ route('detail-profil') }}"><span style="font-size:16px;">Detail Profil</span></a></li>
                  <li>
                    <form action="{{ route('logout') }}" method="post" id="logoutForm">
                      @csrf
                      <a onclick="document.getElementById('logoutForm').submit();">
                        <span style="font-size:16px;">Logout</span>
                      </a>
                  </form>
                </li>
                </ul>
              </li>
              @else
              <li class="dropdown">
                <a href="#" class="d-flex flex-row">
                  <span style="font-size:16px;">Hai, Rescuer!</span>
                  <img src="{{ asset('assets/images/home/Guest.png') }}" alt="" style="width: 40px; height: 40px; border-radius: 50%; object-fit: contain; border: 2px solid #ffffff; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
                </a>
                <ul>
                  <li><a href="{{ route('masuk') }}"><span style="font-size:16px;">Masuk</span></a></li>
                  <li><a href="{{ route('daftar') }}"><span style="font-size:16px;">Daftar</span></a></li>
                </li>
                </ul>
              </li>
            @endif
            </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle" style="color: black"></i>
      </nav>
      <!-- end nav -->
      <div class="d-flex flex-row" >
        
      </div>
    </div>
</header>

<!-- End Header -->

<!-- ======= Header Mobile ======= -->

<header id="mobile-header" class="">
    <!-- <div class="container justify-content-evenly"> -->
    <div class="container">
      <a href="{{ url('/') }}" class="logo me-auto"><img src="{{url('/')}}/assets/img/main_logo.png" alt="" class="img-fluid"></a>
      <button class="hamburger">
        <div class="bar"></div>
      </button>
    </div>
  </header>
  <nav class="mobile-ver overflow-auto">
    <!-- <nav class="mobile-ver"> -->
    <div class="container">
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item" style="background-color: transparent;">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: transparent; font-size: 20px; color: #5E6666; font-weight: 700;">
              Tentang
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <a href="{{ url('tentang-kami') }}" style="color: #5E6666; font-size: 20px; font-weight: 700;"><li>Tentang Kami</li></a>
              <a href="{{ url('visi-misi') }}" style="color: #5E6666; font-size: 20px; font-weight: 700;"><li>Visi Misi</li></a>
              <a href="{{ url('mengapa-IDL-express') }}" style="color: #5E6666; font-size: 20px; font-weight: 700;"><li>Mengapa IDL Express</li></a>
              <a href="{{ url('sektor-industri') }}" style="color: #5E6666; font-size: 20px; font-weight: 700;"><li>Sektor Industri</li></a>
              <a href="{{ url('karir') }}" style="color: #5E6666; font-size: 20px; font-weight: 700;"><li>Karier</li></a>
            </div>
          </div>
        </div>
        <div class="accordion-item" style="background-color: transparent;">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="background-color: transparent; font-size: 20px; color: #5E6666; font-weight: 700;">
              Layanan
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              <a href="{{ url('layanan-pengiriman-khusus') }}" style="color: #5E6666; font-size: 20px; font-weight: 700;"><li>Pengiriman Khusus</li></a>
              <a href="{{ url('layanan-pengiriman-unggulan') }}" style="color: #5E6666; font-size: 20px; font-weight: 700;"><li>Pengiriman Unggulan</li></a>
              <a href="{{ url('layanan-pengiriman-kargo') }}" style="color: #5E6666; font-size: 20px; font-weight: 700;"><li>Pengiriman Kargo</li></a>
            </div>
          </div>
        </div>
        <a href="{{ url('blog') }}" style="font-size: 20px; padding: 16px 20px 16px 20px;"><h2 style="color: #5E6666">Blog</h2></a>
        <div style="padding: 16px 0px 16px 0px;">
          <button onclick="window.location.href='{{ url('hubungi-kami') }}';" type="button" class="contact-btn-nav" style="width: 100%;"><b>Hubungi Kami</b></button>
        </div>
      </div>
    </div>
  </nav>

