@extends('internal.layout.dashboard')

<style>

</style>

@section('content')
<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <div class="d-flex my-3 justify-content-between align-items-center mb-10 mt-5">
            <div class="flex-grow-1">
                <h1 class="text-center">Form Penemuan Hewan Liar</h1>
            </div>
        </div>
        <div class="row my-3 justify-content-center g-2">
            <div class="col-auto mx-3">
                @if($photo_animal)
                    <img src="{{ asset('storage/report/' . $detail->photo_animal) }}" 
                         alt="Foto Hewan" 
                         class="border border-2"
                         style="width: 180px; height: 180px; border-radius: 15px; object-fit: cover; border-color: #dee2e6 !important;">
                @else
                    <div class="border border-2 d-flex align-items-center justify-content-center" 
                         style="width: 180px; height: 180px; border-radius: 15px; border-color: #dee2e6 !important;">
                        <span style="color: #6c757d">Foto Hewan</span>
                    </div>
                @endif
            </div>
            <div class="col-auto mx-3">
                @if($photo_location)
                    <img src="{{ asset('storage/report/' . $detail->photo_animal) }}" 
                         alt="Foto Hewan" 
                         class="border border-2"
                         style="width: 180px; height: 180px; border-radius: 15px; object-fit: cover; border-color: #dee2e6 !important;">
                @else
                    <div class="border border-2 d-flex align-items-center justify-content-center" 
                         style="width: 180px; height: 180px; border-radius: 15px; border-color: #dee2e6 !important;">
                        <span style="color: #6c757d">Foto lokasi</span>
                    </div>
                @endif
            </div>
            <div class="col-auto mx-3">
                @if($photo_additional)
                    <img src="{{ asset('storage/report/' . $detail->photo_animal) }}" 
                         alt="Foto Hewan" 
                         class="border border-2"
                         style="width: 180px; height: 180px; border-radius: 15px; object-fit: cover; border-color: #dee2e6 !important;">
                @else
                    <div class="border border-2 d-flex align-items-center justify-content-center" 
                         style="width: 180px; height: 180px; border-radius: 15px; border-color: #dee2e6 !important;">
                        <span style="color: #6c757d">Foto Tambahan</span>
                    </div>
                @endif
            </div>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Nama Pelapor</label>
            <input type="text" name="namaPelapor" id="namaPelapor" value="{{$detail->users->name}}" class="form-control" disabled>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="mb-2">No Telepon</label>
                <input type="text" name="noTelepon" id="noTelepon" value="{{$detail->users->phone_number}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="" class="mb-2">No Whatsapp</label>
                <input type="text" name="noWhatsapp" id="noWhatsapp" value="{{$detail->users->whatsapp_number}}" class="form-control" disabled>
            </div>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Jenis Hewan</label>
            <input type="text" name="jenisHewan" id="jenisHewan" value="{{$detail->animal_type}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" value="{{$detail->location}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Lokasi Google Maps</label>
            <div class="form-control bg-light d-flex align-items-center">
                <a href="{{$detail->location_map}}" target="_blank" class="text-muted text-decoration-none overflow-hidden" rel="noopener noreferrer">{{$detail->location_map}}</a>
            </div>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" disabled>{{$detail->description}}</textarea>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Tanggal Laporan Dibuat</label>
            <input type="text" name="tanggalLaporanDibuat" id="tanggalLaporanDibuat" value="{{$detail->created_at}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Status Laporan</label>
            <select name="statusLaporan" id="statusLaporan" class="form-select" disabled>
                <option value="1" {{ $detail->status_id == 1 ? 'selected' : '' }}>Penyelamatan Diajukan</option>
                <option value="2" {{ $detail->status_id == 2 ? 'selected' : '' }}>Dalam Proses Penyelamatan</option>
                <option value="3" {{ $detail->status_id == 3 ? 'selected' : '' }}>Hewan Sukses Diselamatkan</option>
                <option value="4" {{ $detail->status_id == 4 ? 'selected' : '' }}>Hewan Tidak Ditemukan</option>
                <option value="5" {{ $detail->status_id == 5 ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Respon Admin</label>
            <textarea name="responAdmin" id="responAdmin" class="form-control" rows="4" disabled>Admin Respons</textarea>
        </div>
        <div class="d-flex justify-content-center mt-10">
            <form action="{{route('formReport.detail', $detail->report_form_id)}}" 
                  method="get" 
                  onsubmit="return confirm('Apakah Anda Ingin Mengupdate Laporan Ini?');">
                <button class="btn btn-secondary border border-dark px-5 py-3 fs-5">
                    Ubah Status Laporan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection