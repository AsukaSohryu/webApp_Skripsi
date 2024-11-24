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
        <h1 class="text-center">Edit Formulir Adopsi</h1>
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


        <form action="{{ route('formAdopsi.edit.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row my-3">
                <div class="col">
                    <input type="text" name="adoptionID" id="adoptionID" value="{{$detail->adoption_form_id}}" class="form-control" hidden>
                </div>
            </div>
            <div class="col">
                <label for="" class="my-3">Status Formulir Adopsi</label>
                <select class="form-control custom-dropdown" id="statusID" name="statusID" required>
                    @foreach($adoptionFormStatus as $s)
                        <option value="{{ $s->status_id }}" {{ $s->status_id == $detail->status_id ? 'selected' : '' }}>
                            {{ $s->status }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Admin Feedback</label>
                    <input type="text" name="adminFeedback" id="adminFeedback" value="{{$detail->admin_feedback}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <input type="text" name="isSeen" id="isSeen" value="0" class="form-control" hidden>
                </div>
            </div>
            <div class=" my-3 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit" style="border: 0;">Simpan Perubahan</button>
            </div>            
        </form>
    </div>
</div>


@endsection