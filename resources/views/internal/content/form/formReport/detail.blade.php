@extends('internal.layout.dashboard')

<style>
    .button{
        background-color: #d2d2d2;
        width: 60px;
        height: 30px;
        border-radius: 200px;
        cursor: pointer;
        position: relative;
        transition: 0.2s;
    }
    .button::before{
        position: absolute;
        content: '';
        background-color: #fff;
        width: 20px;
        height: 20px;
        border-radius: 200px;
        margin: 5px;
        transition: 0.2s;
    }
    .image {
        width: 180px;
        height: 180px;
        border-radius: 15px;
        object-fit: cover;
        border-color: #dee2e6 !important;
    }
    .image-placeholder {
        width: 180px;
        height: 180px;
        border-radius: 15px;
        border-color: #dee2e6 !important;
    }
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
                    <img src="{{ asset('storage/report/' . $detail->photo_animal) }}" alt="Foto Hewan" class="border border-2 report-image">
                @else
                    <div class="border border-2 d-flex align-items-center justify-content-center image-placeholder">
                        <span style="color: #6c757d">Foto Hewan</span>
                    </div>
                @endif
            </div>
            <div class="col-auto mx-3">
                @if($photo_location)
                    <img src="{{ asset('storage/report/' . $detail->photo_location) }}" alt="Foto Lokasi" class="border border-2 report-image">
                @else
                    <div class="border border-2 d-flex align-items-center justify-content-center image-placeholder">
                        <span style="color: #6c757d">Foto lokasi</span>
                    </div>
                @endif
            </div>
            <div class="col-auto mx-3">
                @if($photo_additional)
                    <img src="{{ asset('storage/report/' . $detail->photo_additional) }}" alt="Foto Tambahan" class="border border-2 report-image">
                @else
                    <div class="border border-2 d-flex align-items-center justify-content-center image-placeholder">
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
            <textarea name="responAdmin" id="responAdmin" class="form-control" rows="4" disabled>{{$detail->admin_feedback}}</textarea>
        </div>
        @if(!in_array($detail->status_id, [3, 4, 5]))
            <div class="my-10 d-flex justify-content-end">
                <form action="{{ route('formReport.edit', $detail->report_form_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengupdate Laporan Ini?');">
                    <button class="btn btn-primary" style="border: 0;" title="Edit">Simpan Perubahan</button>
                </form>
            </div>
        @else
            <div class="my-10 d-flex justify-content-end">
                <button class="btn btn-secondary" disabled title="Laporan  sudah final">Status Tidak Dapat Diubah</button>
            </div>
        @endif
    </div>
</div>
@endsection