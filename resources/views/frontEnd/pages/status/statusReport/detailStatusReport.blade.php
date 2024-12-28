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
        <p class="type-2">Status</p>
        <p class="type-2">Status Laporan Penemuan Hewan Hilang</p>
    </div>
</section>

<section id="section-1-status-penemuan">
    <div class="container">
        <h4 class="text-center">Status Laporan Penemuan Hewan Hilang</h4>
        <hr>
    </div>
    <div class="container justify-content-center">
        <div class="col my-3">
            <div class="row my-3 d-flex flex-row flex-wrap justify-content-center g-2" style="gap: 8px;">
                <div class="col-3 d-flex justify-content-center">
                    <img src="@if($reports->admin_feedback_photo) 
                                 {{ asset('storage/formReport/' . $reports->admin_feedback_photo) }}
                              @else
                                 {{ asset('storage/formReport/' . $reports->animal_photo) }}
                              @endif"
                         alt="Foto Hewan" 
                         class="border border-2 report-image img-fluid" 
                         style="height: 200px; object-fit: cover;">
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <img src="{{ asset('storage/formReport/' . $reports->location_photo) }}" alt="Foto Lokasi" class="border border-2 report-image img-fluid" style="height: 200px; object-fit: cover;">
                </div>
                <div class="col-3 d-flex justify-content-center">
                    @if($reports->additional_photo)
                        <img src="{{ asset('storage/formReport/' . $reports->additional_photo) }}" alt="Foto Tambahan" class="border border-2 report-image img-fluid" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="border border-2 d-flex align-items-center justify-content-center image-placeholder" style="height: 200px;">
                            <span style="color: #6c757d">Foto Tambahan</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col my-3">
                <label for="" class="mb-2">Nama Pelapor</label>
                <input type="text" name="namaPelapor" id="namaPelapor" value="{{$reports->users->name}}" class="form-control" disabled>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="mb-2">No Telepon</label>
                    <input type="text" name="noTelepon" id="noTelepon" value="{{$reports->users->phone_number}}" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="" class="mb-2">No Whatsapp</label>
                    <input type="text" name="noWhatsapp" id="noWhatsapp" value="{{$reports->users->whatsapp_number}}" class="form-control" disabled>
                </div>
            </div>
            <div class="col my-3">
                <label for="" class="mb-2">Jenis Hewan</label>
                <input type="text" name="jenisHewan" id="jenisHewan" value="{{$reports->animal_type}}" class="form-control" disabled>
            </div>
            <div class="col my-3">
                <label for="" class="mb-2">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" value="{{$reports->location}}" class="form-control" disabled>
            </div>
            <div class="col my-3">
                <label for="" class="mb-2">Lokasi Google Maps</label>
                <div class="form-control bg-light d-flex align-items-center">
                    <a href="{{$reports->location_map}}" target="_blank" class="text-muted text-decoration-none overflow-hidden" rel="noopener noreferrer">{{$reports->location_map}}</a>
                </div>
            </div>
            <div class="col my-3">
                <label for="" class="mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" disabled>{{$reports->description}}</textarea>
            </div>
            <div class="col my-3">
                <label for="" class="mb-2">Tanggal Laporan Dibuat</label>
                <input type="text" name="tanggalLaporanDibuat" id="tanggalLaporanDibuat" value="{{$reports->created_at}}" class="form-control" disabled>
            </div>
            <div class="col my-3">
                <div class="col">
                    <label for="">Status Laporan</label>
                    <input type="text" name="statusLaporan" id="statusLaporan" value="{{$reports->status->status}}" class="form-control" disabled>
                </div>
            </div>
            <div class="col my-3">
                <label for="" class="mb-2">Respon Admin</label>
                <textarea name="responAdmin" id="responAdmin" class="form-control" rows="4" disabled>{{$reports->admin_feedback}}</textarea>
            </div>
            </hr>
            <div class="row my-3">
                <div class="col">
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