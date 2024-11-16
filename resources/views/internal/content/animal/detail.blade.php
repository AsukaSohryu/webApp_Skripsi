@extends('internal.layout.dashboard')

@section('content')
<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <h1 class="text-center">Detail Data Hewan</h1>
        <div class="row my-3">
            <div class="col my-3 d-flex justify-content-center">
                <img src="{{ asset('storage/animal/' . $detail->photo) }}" alt="" style="width: 200px; height: 200px; border-radius: 15px;">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">ID Hewan</label>
                <input type="text" name="idHewan" id="idHewan" value="{{$detail->animal_id}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">Nama Hewan</label>
                <input type="text" name="namaHewan" id="namaHewan" value="{{$detail->animal_name}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Jenis Hewan</label>
                <input type="text" name="jenisHewan" id="jenisHewan" value="{{$detail->animal_type}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">Umur</label>
                <input type="text" name="umur" id="umur" value="{{$detail->age}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Usia Hewan</label>
                <input type="text" name="usiaHewan" id="usiaHewan" value="{{ $detail->age }}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tanggalLahir" id="tanggalLahir" value="{{ $detail->birth_date }}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Warna Hewan</label>
                <input type="text" name="warnaHewan" id="warnaHewan" value="{{ $detail->color }}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">Berat Hewam</label>
                <input type="text" name="beratHewan" id="beratHewan" value="{{ $detail->weight }} KG" class="form-control" disabled>
            </div>
        </div>
    </div>
</div>
@endsection