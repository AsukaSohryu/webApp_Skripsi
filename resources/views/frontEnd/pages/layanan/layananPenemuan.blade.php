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
        <p class="type-2">Laporan Penemuan Hewan Peliharaan Liar</p>
    </div>
</section>

<section id="section-1-laporan-penemuan">
    <div class="container">
        <h1 class="text-center">Laporan Penemuan Hewan Peliharaan Liar</h1>
        <hr />
        <h5>Panduan melaporkan penemuan hewan liar:</h5>
        <ol type="1">
            <li>Pastikan keadaan hewan yang ditemukan (Apakah dalam keadaan terluka dan memerlukan bantuan?)</li>
            <li>Jika hewan yang anda temukan dalam kondisi sehat, tidak terluka maupun memerlukan bantuan, maka abaikan hewan tersebut, terutama kucing (Pada umumnya kucing jalanan yang berada dalam kondisi sehat menandakan bahwa ada yang merawat)</li>
            <li>Jika hewan yang anda termukan dalam kondisi terluka/memerlukan bantuan, berikut hal yang harus anda persiapkan sebelum membuat laporan.
                <ul>
                    <li>Ambilah foto anjing/kucing liar yang anda temukan</li>
                    <li> google maps, klik lokasi disekitar anda menemukan yang dapat dijadikan patokan/acuan</li>
                    <li>Foto lokasi penemuan beserta anjing/kucing liar yang anda temukan</li>
                    <li>Foto bebas yang memungkinkan menjadi bantuan dalam mencari hewan liar tersebut.</li>
                </ul>
            </li>
        </ol>
        <h5 style="font-weight: 900">*Pemilik akun bertanggung jawab atas laporan yang dibuat</h5>
    </div>
    <div class="container border border-black my-3" style="border-radius: 16px">
        <form action="" enctype="multipart/form-data">
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Nama Pelapor</label>
                    <input type="text" class="form-control" placeholder="Nama Pelapor">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">No Telepon</label>
                    <input type="text" class="form-control" placeholder="No Telepon">
                </div>
                <div class="col">
                    <label for="" class="my-3">No Whatsapp</label>
                    <input type="text" class="form-control" placeholder="No Whatsapp">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Jenis Hewan</label>
                    <select name="statusLaporan" id="statusLaporan" class="form-select">
                        <option value="">Puddle</option>
                        <option value="">Puddle</option>
                        <option value="">Puddle</option>
                    </select>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Lokasi (Deskripsi, Patokan)</label>
                    <input type="text" class="form-control" placeholder="Lokasi (Deskripsi, Patokan)">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Lokasi Google Maps</label>
                    <input type="text" class="form-control" placeholder="Lokasi Google Maps">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Deskripsi</label>
                    <input type="text" class="form-control" placeholder="Deskripsi hewan, kondisi hewan, tempat/lokasi, dan penjelasan yang dapat membantu, Hari/Tanggal dan waktu ditemukan">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Upload Foto Hewan</label>
                    <input type="file" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Upload Foto Lokasi Penemuan</label>
                    <input type="file" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Upload Foto Pendukung</label>
                    <input type="file" class="form-control">
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')

@endsection