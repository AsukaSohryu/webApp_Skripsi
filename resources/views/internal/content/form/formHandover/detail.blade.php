@extends('internal.layout.dashboard')

@section('content')
<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <h1 class="text-center">Detail Pengajuan Penyerahan Hewan</h1>
        <div class="row my-3">
            <div class="col">
                <label for="">Nama Pengguna</label>
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
                <label for="">Alamat Pengguna</label>
                <input type="text" name="address" id="address" value="{{$detail->users->address}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Pekerjaan Pengguna</label>
                <input type="text" name="job" id="job" value="{{$detail->users->job}}" class="form-control" disabled>
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
        <hr>
        @foreach ($detail->handoverQuestions as $question)
            <div class="row my-3">
                <div class="col">
                    <!-- Label for the question -->
                    <label for="question-{{ $question->id }}" class="form-label">
                        {{ $question->questions }}
                    </label>

                    <!-- Input for the answer -->
                    <input type="text" 
                        id="question-{{ $question->id }}" 
                        name="answers[{{ $question->id }}]" 
                        class="form-control" 
                        value="{{ $question->pivot->answer ?? '' }}" 
                        placeholder="Enter your answer" disabled>
                </div>
            </div>
        @endforeach
        <div class=" my-3 d-flex justify-content-end">
            <form action="{{ route('formHandover.edit', $detail->handover_form_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Data Formulir Penyerahan Ini?');">
                <button class="btn btn-primary" style="border: 0;" title="Edit">Ubah Data Formulir Penyerahan</button>
            </form>
        </div>
    </div>
</div>
@endsection