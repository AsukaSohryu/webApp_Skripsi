<!-- ======= Header ======= -->
<header id="desktop-header" class="fixed-top">
    <div class="container d-flex justify-content-around" sty>
      <nav id="navbar" class="navbar d-flex align-items-center">
        <ul>
            <a href="{{ url('/') }}" class="logo"><img src="{{url('/')}}/assets/img/main_logo.png" alt="" class="img-fluid"></a>
            <li>
              <a href="{{ url('/') }}"><span style="font-size: 16px;">Home</span></a>
            </li>
            <li>
              <a href="{{ url('tentang-kami') }}"><span style="font-size: 16px;">Tentang Kami</span></a>
            </li>
            <li class="dropdown"><a href="#"><span style="font-size: 16px;">Layanan Kami</span><i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{ url('layanan-hewan-diselamatkan') }}"><span style="font-size: 16px;"><b>Lihat daftar hewan yang diselamatkan</b></span> </a></li>
                <li><a href="{{ url('layanan-laporan-hewan-hilang') }}"><span style="font-size: 16px;"><b>Laporkan Penemuan Hewan Liar</b></span> </a></li>
                <li><a href="{{ url('layanan-pengajuan-penyerahan-hewan') }}"><span style="font-size: 16px;"><b>Ajukan Penyerahan Hewan</b></span> </a></li>
                <li><a href="{{ url('layanan-lihat-hewan-siap-adopsi') }}"><span style="font-size: 16px;"><b>Lihat Hewan Siap Adopsi</b></span></a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#"><span style="font-size: 16px;">Laporan dan Pengajuan</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{ url('status-laporan-penemuan-hewan-hilang') }}"></i><span style="font-size: 16px;"><b>Status Laporan Penemuan Hewan Hilang</b></span></a></li>
                <li><a href="{{ url('status-pengajuan-penyerahan-hewan') }}"></i><span style="font-size: 16px;"><b>Status Pengajuan Penyerahan Hewan</b></span></a></li>
                <li><a href="{{ url('status-pengajuan-pengadopsian-hewan') }}"></i><span style="font-size: 16px;"><b>Status Pengajuan Pengadopsian Hewan</b></span></a></li>
              </ul>
            </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle" style="color: black"></i>
      </nav>
<!-- end nav -->
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

