@extends('internal.layout.dashboard')

@section('content')

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

    input:checked + .button{
        background-color: #2D68FE;
    }
    input:checked + .button::before{
        transform: translateX(30px);
    }

    input{
        display: none;
    }
</style>

<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <h1 class="text-center">Detail Data Hewan</h1>
        <form action="{{ route('dataHwan.edit.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row my-3">
                <div class="col my-3 d-flex justify-content-center">
                    <input type="file" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">ID Hewan</label>
                    <input type="text" name="idHewan" id="idHewan" value="{{$detail->animal_id}}" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="">Nama Hewan</label>
                    <input type="text" name="namaHewan" id="namaHewan" value="{{$detail->animal_name}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Jenis Hewan</label>
                    <input type="text" name="jenisHewan" id="jenisHewan" value="{{$detail->animal_type}}" class="form-control">
                </div>
                <div class="col">
                    <label for="">Usia Hewan</label>
                    <input type="text" name="usiaHewan" id="usiaHewan" value="{{ $detail->age }}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                
                <div class="col">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" value="{{ $detail->birth_date }}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Warna Hewan</label>
                    <input type="text" name="warnaHewan" id="warnaHewan" value="{{ $detail->color }}" class="form-control">
                </div>
                <div class="col">
                    <label for="">Berat Hewam</label>
                    <input type="text" name="beratHewan" id="beratHewan" value="{{ $detail->weight }} KG" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Informasi Vaksin Hewan</label>
                    <input type="text" name="informasiVaksin" id="informasiVaksin" value="{{ $detail->vaccine }}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Hewan Sudah Disteril</label>
                    @if($detail->is_sterile == 1)
                    <input type="text" name="sterilHewan" id="sterilHewan" value="Iya" class="form-control">
                    @else
                    <input type="text" name="sterilHewan" id="sterilHewan" value="Belum" class="form-control">
                    @endif
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Asal Hewan</label>
                    <input type="text" name="asalHewan" id="asalHewan" value="{{ $detail->source }}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Karakteristik Hewan</label>
                    <textarea type="text" name="karakteristikHewan" id="karakteristikHewan" class="form-control">{{ $detail->characteristics }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Deskripsi Hewan</label>
                    <textarea type="text" name="deskripsiHewan" id="deskripsiHewan" class="form-control">{{ $detail->description }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Catatan Medis Hewan</label>
                    <textarea type="text" name="catatanMedisHewan" id="catatanMedisHewan" class="form-control">{{ $detail->medical_note }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Tanggal Hewan Masuk Shelter</label>
                    <input type="text" name="tanggalMasuk" id="tanggalMasuk" value="{{ $detail->created_at }}" class="form-control">
                </div>
            </div> 
            <div class="row my-3">
                <div class="col">
                    <label for="">Tanggal Data Terakhir Diperbaharui</label>
                    <input type="text" name="tanggalMasuk" id="tanggalMasuk" value="{{ $detail->updated_at }}" class="form-control">
                </div>
            </div> 
            <div class="row my-3 p-3">
                <div class="d-flex flex-row justify-content-between p-3" style="background-color: #CADFF2; border-radius: .475rem;">
                    <div class="col d-flex align-items-center">
                        <label for=""><b>Pengaturan data hewan aktif atau tidak</b></label>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <input type="checkbox" id="check" {{ $detail->is_active == 1 ? 'checked' : '' }}>
                        <label for="check" class="button"></label>
                        @if($detail->is_active == 1)
                            <label for="" class="ps-3"><b>Aktif</b></label>
                        @else
                            <label for="" class="ps-3"><b>Tidak Aktif</b></label>
                        @endif
                    </div>
                </div>
            </div>
            <div class=" my-3 d-flex justify-content-end">
                <form action="{{ route('dataHewan.edit', $detail->animal_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Data Hewan Ini?');">
                    <button class="btn btn-primary" style="border: 0;" title="Edit">Simpan Data Hewan</button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection