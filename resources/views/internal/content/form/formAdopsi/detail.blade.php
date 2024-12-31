@extends('internal.layout.dashboard')

@section('content')
<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <h1 class="text-center">Detail Pengajuan Pengadopsian Hewan</h1>
        <div class="row my-3">
            <div class="col">
                <label for="">Nama Pengaju</label>
                <input type="text" name="userName" id="userName" value="{{$detail->users->name}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">No Telepon</label>
                <input type="text" name="phoneNumber" id="phoneNumber" value="{{$detail->users->phone_number}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">No Whatsapp</label>
                <input type="text" name="whatsappNumber" id="whatsappNumber" value="{{$detail->users->whatsapp_number}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Alamat</label>
                <input type="text" name="address" id="address" value="{{$detail->users->address}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Pekerjaan</label>
                <input type="text" name="job" id="job" value="{{$detail->users->job}}" class="form-control" disabled>
            </div>
        </div>
        {{-- Area Detail Hewan --}}
        <div class="row my-3">
            <div class="col">
                <label for="">Nama Hewan</label>
                <input type="text" name="animalName" id="animalName" value="{{$detail->animal->animal_name}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">ID Hewan</label>
                <input type="text" name="animalID" id="animalID" value="{{$detail->animal->animal_id}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <form action="{{route('dataHewan.detail', $detail->animal->animal_id)}}" method="get" onsubmit="return confirm('Halaman formulir akan dialihkan ke halaman detail hewan, apakah anda yakin?');">
                <button class="btn btn-primary" style="border: 0;" title="Detail">Lihat Detail Hewan</button>
            </form>
        </div>
        <hr>
        @foreach ($detail->adoptionQuestions as $question)
            <div class="row my-3">
                <div class="col">
                    <!-- Label for the question -->
                    <label for="question-{{ $question->id }}" class="form-label">
                        {{ $question->questions }}
                    </label>

                    <!-- Input for the answer -->
                    <textarea 
                        id="question-{{ $question->id }}" 
                        name="answers[{{ $question->id }}]" 
                        class="form-control" 
                        placeholder="Enter your answer" 
                        disabled>{{ $question->pivot->answer ?? '' }}
                    </textarea>
                </div>
            </div>
        @endforeach
        <hr>
        <div class="col my-3">
            <label for="" class="mb-2">Tanggal Formulir Dibuat</label>
            <input type="text" name="tanggalLaporanDibuat" id="tanggalLaporanDibuat" value="{{$detail->created_at}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Tanggal Formulir Terakhir Diperbaharui</label>
            <input type="text" name="tanggalLaporanDiperbaharui" id="tanggalLaporanDiperbaharui" value="{{$detail->updated_at}}" class="form-control" disabled>
        </div>
        {{-- Updateable Field --}}
        <div class="row my-3">
            <div class="col">
                <label for="">Status Formulir</label>
                <input type="text" name="statusID" id="statusID" value="{{$detail->status->status}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="adminFeedback">Respon Admin</label>
                <textarea 
                    name="adminFeedback" 
                    id="adminFeedback" 
                    class="form-control" 
                    disabled>{{ $detail->admin_feedback }}</textarea>
            </div>
        </div>
        @if(in_array($detail->status_id, $nonEditableStatuses))
        <div class=" my-3 d-flex justify-content-end">
            <form action="{{ route('formAdopsi.edit', $detail->adoption_form_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Data Formulir Adopsi Ini?');">
                <button class="btn btn-secondary" style="border: 0;" title="Edit" disabled>Status Tidak Dapat Diubah</button>
            </form>
        </div>
        @else
        <div class=" my-3 d-flex justify-content-end">
            <form action="{{ route('formAdopsi.edit', $detail->adoption_form_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Data Formulir Adopsi Ini?');">
                <button class="btn btn-primary" style="border: 0;" title="Edit">Ubah Data Formulir</button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection