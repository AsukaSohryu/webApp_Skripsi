@extends('internal.layout.dashboard')

@section('content')
<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <h1 class="text-center">Detail Formulir Pengajuan Penyerahan Hewan</h1>
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
                            case 7:
                                $unit = ' Kg';
                                $inputValue = $question->pivot->answer ?? '';
                                break;
                            case 9:
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
        <div class="col my-3">
            <label for="" class="mb-2">Tanggal Formulir Dibuat</label>
            <input type="text" name="tanggalLaporanDibuat" id="tanggalLaporanDibuat" value="{{$detail->created_at}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Tanggal Formulir Terakhir Diperbaharui</label>
            <input type="text" name="tanggalLaporanDiperbaharui" id="tanggalLaporanDiperbaharui" value="{{$detail->updated_at}}" class="form-control" disabled>
        </div>
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
                <form action="{{ route('formHandover.edit', $detail->handover_form_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Data Formulir Penyerahan Ini?');">
                    <button class="btn btn-secondary" style="border: 0;" title="Edit" disabled>Status Tidak Dapat Diubah</button>
                </form>
            </div>
        @else
            <div class=" my-3 d-flex justify-content-end">
                <form action="{{ route('formHandover.edit', $detail->handover_form_id) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Data Formulir Penyerahan Ini?');">
                    <button class="btn btn-primary" style="border: 0;" title="Edit" id="editForm">Ubah Data Formulir</button>
                </form>
            </div>
        @endif

    </div>
</div>

<script>
    document.getElementById('editForm').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission by default

        // Show SweetAlert2 confirmation popup
        Swal.fire({
            title: 'Apakah Anda Mengubah Data Formulir?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Lanjutkan',
            cancelButtonText: 'Tidak, Kembali',
        }).then((result) => {
            if (result.isConfirmed) {
                // If "Yes, submit it!" is clicked, submit the form
                window.location.href = '{{ route('formHandover.edit', $detail->handover_form_id) }}';
            }
        });
    });
</script>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Berhasil',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'Oke',
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        title: 'Gagal',
        text: '{{ session('error') }}',
        icon: 'error',
        confirmButtonText: 'Oke'
    });
</script>
@endif
@endsection