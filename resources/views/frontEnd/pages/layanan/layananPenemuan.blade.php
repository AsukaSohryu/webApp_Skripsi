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
        <form action="{{ route('layanan-laporan-post') }}" method="POST" class="m-4" enctype="multipart/form-data">
            @csrf
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Nama Pelapor</label>
                    <input type="text" name="namaPelapor" id="namaPelapor" value="" placeholder="Nama Pelapor" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">No Telepon</label>
                    <input type="text" name="" id="" class="form-control" placeholder="No Telepon" required>
                </div>
                <div class="col">
                    <label for="" class="my-3">No Whatsapp</label>
                    <input type="text" name="" id="" class="form-control" placeholder="No Whatsapp" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Jenis Hewan</label>
                    <select name="jenisHewan" id="jenisHewan" class="form-select" required>
                        <option value="" selected disabled>Pilih Jenis Hewan</option>
                        <option value="Anjing">Anjing</option>
                        <option value="Kucing" >Kucing</option>
                    </select>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Lokasi (Deskripsi, Patokan)</label>
                    <input type="text" name="lokasi" id="lokasi" value="" placeholder="Lokasi (Deskripsi, Patokan)" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Lokasi Google Maps</label>
                    <input type="text" name="lokasiMaps" id="lokasiMaps" value="" placeholder="Lokasi Google Maps" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Deskripsi hewan, kondisi hewan, tempat/lokasi, dan penjelasan yang dapat membantu, Hari/Tanggal dan waktu ditemukan" required></textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Upload Foto Hewan</label>
                    <input type="file" name="fotoHewan" id="fotoHewan" class="form-control" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml" required>
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Upload Foto Lokasi Penemuan</label>
                    <input type="file" name="fotoLokasi" id="fotoLokasi" class="form-control" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml" required>
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Upload Foto Pendukung</label>
                    <input type="file" name="fotoBebas" id="fotoBebas" class="form-control" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml">
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                </div>
            </div>
            <div class="row my-3">
                <div class="gap-3 mt-4 d-flex justify-content-center">
                    <button class="btn btn-primary" style="border: 0;" title="Edit">Kirim Laporan</button>
                </div>
            </div>
            
        </form>
    </div>
</section>
@endsection

@section('js')

@endsection





{{-- 
@extends('internal.layout.dashboard')

@section('content')
<div class="card mb-4">
    
    <div class="card-body mx-10 mb-10 border border-2 rounded">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="" value="">
            @csrf
            <div class="col my-3">
                <label for="lokasi" class="mb-2">Lokasi (Deskripsi, patokan)</label>
                <input type="text" name="lokasi" id="lokasi" value="" placeholder="Lokasi (Deskripsi, patokan)" class="form-control">
            </div>
            <div class="col my-3">
                <label for="lokasiMaps" class="mb-2">Lokasi Google Maps</label>
                <input type="text" name="lokasiMaps" id="lokasiMaps" value="" placeholder="Lokasi Google Maps" class="form-control">
            </div>
            <div class="col my-3">
                <label for="deskripsi" class="mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" placeholder="Deskripsi hewan, kondisi hewan, tempat/lokasi, dan penjelasan yang dapat membantu, Hari/Tanggal dan waktu ditemukan"></textarea>
            </div>
            <div class="row my-3">
                <label for="fotoHewan" class="mb-2">Upload foto hewan</label>
                <div class="col d-flex flex-column justify-content-center">
                    <input type="file" name="fotoHewan" id="fotoHewan" class="form-control" name="fotoHewan">
                </div>
            </div>
            <div class="row my-3">
                <label for="fotoLokasi" class="mb-2">Upload foto lokasi penemuan</label>
                <div class="col d-flex flex-column justify-content-center">
                    <input type="file" name="fotoLokasi" id="fotoLokasi" class="form-control" name="fotoLokasi">
                </div>
            </div>
            <div class="row my-3">
                <label for="fotoBebas" class="mb-2">Upload foto bebas</label>
                <div class="col d-flex flex-column justify-content-center">
                    <input type="file" name="fotoBebas" id="fotoBebas" class="form-control" name="fotoBebas">
                </div>
            </div>
            <div class="gap-3 my-10 d-flex justify-content-center">
                <button class="btn btn-primary" style="border: 0;" title="Edit">Ubah Status Laporan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <h2>{{ session('success') }}</h2>
        </div>
        <div class="modal-footer">
            <a href="" type="button" class="btn btn-secondary" data-dismiss="modal">kembali</a>
        </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
            {{ session('error') }}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
@endsection --}}
