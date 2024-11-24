@extends('internal.layout.dashboard')

@section('content')
<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <h1 class="text-center">Detail Pengajuan Pengadopsian Hewan</h1>
        <div class="row my-3">
            <div class="col">
                <label for="">Nama Pengguna</label>
                <input type="text" name="idHewan" id="idHewan" value="{{$detail->users->name}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">No Telepon</label>
                <input type="text" name="jenisHewan" id="jenisHewan" value="{{$detail->users->phone_number}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">No Whatsapp</label>
                <input type="text" name="umur" id="umur" value="{{$detail->users->whatsapp_number}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Alamat Pengguna</label>
                <input type="text" name="idHewan" id="idHewan" value="{{$detail->users->address}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Pekerjaan Pengguna</label>
                <input type="text" name="idHewan" id="idHewan" value="{{$detail->users->job}}" class="form-control" disabled>
            </div>
        </div>
        {{-- Area Detail Hewan --}}
        <div class="row my-3">
            <div class="col">
                <label for="">Nama Hewan</label>
                <input type="text" name="jenisHewan" id="jenisHewan" value="{{$detail->animal->animal_name}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">Umur</label>
                <input type="text" name="umur" id="umur" value="{{$detail->animal->age}}" class="form-control" disabled>
            </div>
        </div>
        {{-- Area Adoption Form Questions --}}
        {{-- <div class="row my-3">
            <div class="col">
                <label for="">Alamat Pengguna</label>
                <input type="text" name="idHewan" id="idHewan" value="{{$adoptionQuestions->questions}}" class="form-control" disabled>
            </div>
        </div> --}}
        {{-- Updateable Field --}}
        <div class="row my-3">
            <div class="col">
                <label for="">Status Laporan</label>
                <input type="text" name="statusID" id="statusID" value="{{$detail->status->status}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Admin Feedback</label>
                <input type="text" name="adminFeedback" id="adminFeedback" value="{{$detail->admin_feedback}}" class="form-control" disabled>
            </div>
        </div>
        <div class=" my-3 d-flex justify-content-end">
            <form action="{{ route('formAdopsi.edit', $detail->adoption_form_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Data Formulir Adopsi Ini?');">
                <button class="btn btn-primary" style="border: 0;" title="Edit">Ubah Data Formulir Adopsi</button>
            </form>
        </div>
    </div>
</div>
@endsection