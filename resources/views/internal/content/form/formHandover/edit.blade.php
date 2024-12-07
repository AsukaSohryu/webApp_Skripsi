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
        <h1 class="text-center">Edit Formulir Penyerahan</h1>
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
        <form action="{{ route('formHandover.edit.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row my-3">
                <div class="col">
                    <input type="text" name="handoverFormID" id="handoverFormID" value="{{$detail->handover_form_id}}" class="form-control" hidden>
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
            <hr>
            <div class="col">
                <label for="" class="my-3">Status Formulir Penyerahan</label>
                <select class="form-control custom-dropdown" id="statusID" name="statusID" required>
                    @foreach($handoverFormStatus as $s)
                        <option value="{{ $s->status_id }}" {{ $s->status_id == $detail->status_id ? 'selected' : '' }}>
                            {{ $s->status }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="adminFeedback">Respon Admin</label>
                    <textarea 
                        name="adminFeedback" 
                        id="adminFeedback" 
                        class="form-control">{{ $detail->admin_feedback }}</textarea>
                </div>
            </div>
            @if(!in_array($detail->status_id, [8, 9, 10]))
                <div class="gap-3 my-10 d-flex justify-content-end">
                    <a href="{{ route('formHandover.detail', $detail->handover_form_id) }}" 
                        class="btn btn-secondary"
                        style="border: 0;">
                         Batalkan
                    </a>
                    <button class="btn btn-primary" type="submit" style="border: 0;">Simpan Perubahan</button>
                </div>
            @else
                <div class="my-10 d-flex justify-content-end">
                    <button class="btn btn-secondary" disabled title="Laporan  sudah final">Status Tidak Dapat Diubah</button>
                </div>
            @endif
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
            <h2>{{ session('success') }}</h2>
        </div>
        <div class="modal-footer">
            <a href="{{ route('formHandover.detail', $detail->handover_form_id) }}" type="button" class="btn btn-secondary" data-dismiss="modal">kembali</a>
        </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-body">
            {{ session('error') }}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Show the modal
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    });
</script>
@endif

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Show the modal
        const successModal = new bootstrap.Modal(document.getElementById('errorModal'));
        successModal.show();
    });
</script>
@endif

@endsection