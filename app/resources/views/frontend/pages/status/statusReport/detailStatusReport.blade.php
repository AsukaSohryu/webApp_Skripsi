@extends('frontend.layout.layout')

@section('link')

@endsection

@section('content')
<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="hero" style="height: 76vh; background-image: url('{{ asset('assets/images/layananKami/woman_dog.jpg') }}'); background-position: center;">
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Riwayat Laporan Dan Pengajuan</p>
        <p class="type-2">Riwayat Laporan Penemuan Hewan Peliharaan Liar</p>
        <p class="type-2">Formulir Laporan Penemuan Hewan Peliharaan Liar</p>
    </div>
</section>

<section id="section-1-status-penemuan">
    <div class="container my-3">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Formulir Laporan Penemuan Hewan Peliharaan Liar</h1>
            <hr />
        </div>
    </div>
    <div class="container justify-content-center border border-black my-2" style="border-radius: 16px; gap: 0;">
        <div class="row mx-4 mt-4">
            <div class="row my-1">
                <div class="row d-flex flex-row flex-wrap justify-content-center g-2 my-2" style="gap: 8px;">
                    <div class="col-3 d-flex justify-content-center">
                        <img src="@if($reports->admin_feedback_photo) 
                                    {{ asset('uploadedImages/laporanPenemuan/responAdmin/' . $reports->admin_feedback_photo) }}
                                @else
                                    {{ asset('uploadedImages/laporanPenemuan/fotoHewan/' . $reports->animal_photo) }}
                                @endif"
                            alt="Foto Hewan" 
                            class="border border-2 report-image img-fluid" 
                            style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        <img src="{{ asset('uploadedImages/laporanPenemuan/fotoLokasi/' . $reports->location_photo) }}" alt="Foto Lokasi" class="border border-2 report-image img-fluid" style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="col-3 d-flex justify-content-center">
                        @if($reports->additional_photo)
                            <img src="{{ asset('uploadedImages/laporanPenemuan/fotoTambahan/' . $reports->additional_photo) }}" alt="Foto Tambahan" class="border border-2 report-image img-fluid" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="border border-2 d-flex align-items-center justify-content-center image-placeholder" style="height: 200px;">
                                <span style="color: #6c757d">Foto Tambahan</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Nama Pengaju</label>
                    <input type="text" name="userName" id="userName" value="{{$reports->users->name}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">No Telepon</label>
                    <input type="text" name="phoneNumber" id="phoneNumber" value="{{$reports->users->phone_number}}" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-2">No Whatsapp</label>
                    <input type="text" name="whatsappNumber" id="whatsappNumber" value="{{$reports->users->whatsapp_number}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Alamat</label>
                    <input type="text" name="address" id="address" value="{{$reports->users->address}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Pekerjaan</label>
                    <input type="text" name="job" id="job" value="{{$reports->users->job}}" class="form-control" disabled>
                </div>
            </div>
        </div>
        <div class="row mx-4">
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Jenis Hewan</label>
                    <input type="text" name="jenisHewan" id="jenisHewan" value="{{$reports->animal_type}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" value="{{$reports->location}}" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-2">Lokasi Google Maps</label>
                    <div class="form-control bg-light d-flex align-items-center">
                        <a href="{{$reports->location_map}}" target="_blank" class="text-muted text-decoration-none overflow-hidden" rel="noopener noreferrer">{{$reports->location_map}}</a>
                    </div>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" disabled>{{$reports->description}}</textarea>
                </div>
            </div>
        </div>
        <hr style="margin-left: 2.3rem; margin-right: 3.7rem;">
        <div class="row mx-4">
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Tanggal Laporan Dibuat</label>
                    <input type="text" name="tanggalLaporanDibuat" id="tanggalLaporanDibuat" value="{{$reports->created_at}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Tanggal Laporan Terakhir Diperbaharui</label>
                    <input type="text" name="tanggalLaporanDiperbaharuit" id="tanggalLaporanDiperbaharui" value="{{$reports->updated_at}}" class="form-control" disabled>
                </div>
            </div>
        </div>
        <div class="row mx-4 mb-4">
            {{-- Updateable Field --}}
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Status Formulir</label>
                    <input type="text" name="statusReport" id="statusReport" value="{{$reports->status->status}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="adminFeedback" class="my-2">Respon Admin</label>
                    <textarea 
                        name="adminFeedback" 
                        id="adminFeedback" 
                        class="form-control" 
                        disabled>{{ $reports->admin_feedback }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col d-flex justify-content-end">
                    <a href="{{ route('status-laporan') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
@endsection