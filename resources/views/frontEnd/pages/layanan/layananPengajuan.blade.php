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
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Pengajuan Penyerahan Hewan</p>
    </div>
</section>

<section id="section-1-layanan-penyerahan">
    <div class="container">
        <h5>Perhatikan!!!</h5>
        <ol type="1">
            <li><b>Sebelum menyerahkan hewan milik pribadi</b>, pertimbangkan juga alternatif lain sebelum menyerahkan hewan ke shelter, seperti mencari pemilik baru yang dapat merawat hewan tersebut.</li>
            <li><b>Sebelum menyerahkan hewan peliharaan liar (anjing/kucing) yang ditemukan dijalan:</b>
                <ul>
                    <li>Bawa hewan ke dokter hewan untuk pemeriksaan kesehatan menyeluruh.</li>
                    <li>Pastikan hewan tersebut sudah mendapatkan vaksinasi yang diperlukan.</li>
                    <li>Berikan pengobatan terhadap parasit seperti cacing, kutu, dan tungau.</li>
                </ul>
            </li>
        </ol>
        <h5>Ketentuan menyerahkan hewan miliki pribadi:</h5>
        <ol type="1">
            <li><b>Sediakan informasi lengkap berupa:</b>
                <ul>
                    <li>Sediakan informasi rinci mengenai hewan tersebut, seperti usia, jenis kelamin, perilaku, kebiasaan makan, dan sejarah kesehatan.</li>
                    <li>hewan tersebut memiliki riwayat medis atau obat-obatan yang perlu diberikan, informasikan secara jelas kepada shelter.</li>
                </ul>
            </li>
            <li><b>Perlengkapan Hewan:</b>
                <ul>
                    <li>Bawa barang-barang pribadi hewan seperti tempat tidur, mainan, atau makanan favoritnya. Ini akan membantu hewan merasa lebih nyaman di lingkungan baru.</li>
                </ul>
            </li>
        </ol>
        <h5 style="font-weight: 900">*Harap mengontak Admin via whatsapp terlebih dahulu jika ada yang ingin ditanyakan sebelum mengisi formulir</h5>
    </div>
    <div class="container border border-black my-3" style="border-radius: 16px">
        <form action="" enctype="multipart/form-data">  
            {{-- formnya --}}
        </form>
    </div>
    <div class="container my-3" style="border-radius: 16px; background-color: grey;">
        <form action="" enctype="multipart/form-data">
            {{-- formnya --}}
        </form>
    </div>
</section>
@endsection

@section('js')

@endsection