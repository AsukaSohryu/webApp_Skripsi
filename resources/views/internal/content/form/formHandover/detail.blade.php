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
        <hr>
        <div class="row my-3">
            <div class="col my-3 d-flex justify-content-center">
                <img src="{{ asset('storage/formHandover/' . $detail->photo) }}" alt="" style="width: 200px; height: 200px; border-radius: 15px;">
            </div>
        </div>
        @foreach ($detail->handoverQuestions as $question)
            <div class="row my-3">
                <div class="col">
                    <!-- Label for the question -->
                    <label for="question-{{ $question->handover_questions_id }}" class="form-label">
                        {{ $question->questions }}
                    </label>
        
                    @php
                        // Initialize the value based on the question ID
                        $inputValue = '';
                        $unit = '';
        
                        switch ($question->handover_questions_id) {
                            case 3:
                                $unit = ' Tahun';
                                $inputValue = $question->pivot->answer ?? '';
                                break;
                            case 8:
                                $unit = ' Kg';
                                $inputValue = $question->pivot->answer ?? '';
                                break;
                            case 10:
                                $inputValue = ($question->pivot->answer == 1) ? 'Sudah' : 'Belum';
                                break;
                            default:
                                $inputValue = $question->pivot->answer ?? '';
                                break;
                        }
                    @endphp
        
                    <textarea 
                        id="question-{{ $question->handover_questions_id }}" 
                        name="answers[{{ $question->handover_questions_id }}]" 
                        class="form-control" 
                        placeholder="Enter your answer" 
                        disabled>{{ $inputValue . $unit }}
                    </textarea>
                </div>
            </div>
        @endforeach
        {{-- Updateable Field --}}
        <hr>
        <div class="row my-3">
            <div class="col">
                <label for="">Status Laporan</label>
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
        @if($detail->status->status_id == 8 || $detail->status->status_id == 9 || $detail->status->status_id == 10)
            <div class=" my-3 d-flex justify-content-end">
                <form action="{{ route('formHandover.edit', $detail->handover_form_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Data Formulir Penyerahan Ini?');">
                    <button class="btn btn-secondary" style="border: 0;" title="Edit" disabled>Status Tidak Dapat Diubah</button>
                </form>
            </div>
        @else
            <div class=" my-3 d-flex justify-content-end">
                <form action="{{ route('formHandover.edit', $detail->handover_form_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Data Formulir Penyerahan Ini?');">
                    <button class="btn btn-primary" style="border: 0;" title="Edit">Ubah Data Formulir Penyerahan</button>
                </form>
            </div>
        @endif

    </div>
</div>
@endsection