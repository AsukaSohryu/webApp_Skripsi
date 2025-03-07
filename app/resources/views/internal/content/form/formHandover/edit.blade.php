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
        <h1 class="text-center">Formulir Pengajuan Penyerahan Hewan Peliharaan</h1>
        <div class="col my-3">
            <label for="" class="mb-2">Nama Pengaju</label>
            <input type="text" name="namaPelapor" id="namaPelapor" value="{{$detail->users->name}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Email</label>
            <input type="text" name="emailPelapor" id="emailPelapor" value="{{$detail->users->email}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Alamat</label>
            <input type="text" name="alamatPelapor" id="alamatPelapor" value="{{$detail->users->address}}" class="form-control" disabled>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="mb-2">Usia</label>
                <input type="text" name="usiaPelapor" id="usiaPelapor" value="" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="" class="mb-2">Tanggal Lahir</label>
                <input type="text" name="bod" id="bod" value="{{$detail->users->birth_date}}" class="form-control" disabled>
            </div>
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
        <div class="row my-3">
            <div class="col">
                <label for="">Pekerjaan</label>
                <input type="text" name="pekerjaanPelapor" id="pekerjaanPelapor" value="{{$detail->users->job}}" class="form-control" disabled>
            </div>
        </div>
        <hr>
        <form action="{{ route('formHandover.edit.post') }}" method="post" enctype="multipart/form-data" id="formHandover">
            @csrf
            <div class="row my-3">
                <div class="col">
                    <input type="text" name="handoverFormID" id="handoverFormID" value="{{$detail->handover_form_id}}" class="form-control" hidden>
                </div>
            </div>
            <div class="row my-3">
                <div class="col my-3 d-flex justify-content-center">
                    <img src="{{ asset('uploadedImages/layananPenyerahan/fotoHewan/' . $detail->photo) }}" alt="" style="width: 200px; height: 200px; border-radius: 15px;" id="photo">
                    <input type="hidden" name="photo" id="photo" value="{{ $detail->photo }}">
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
            <hr>
            <div class="col my-3">
                <label for="" class="mb-2">Tanggal Formulir Dibuat</label>
                <input type="text" name="tanggalLaporanDibuat" id="tanggalLaporanDibuat" value="{{$detail->created_at}}" class="form-control" disabled>
            </div>
            <div class="col my-3">
                <label for="" class="mb-2">Tanggal Formulir Terakhir Diperbaharui</label>
                <input type="text" name="tanggalLaporanDiperbaharui" id="tanggalLaporanDiperbaharui" value="{{$detail->updated_at}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="" class="my-3">Status Formulir</label>
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
            @if(!in_array($detail->status_id, $nonEditableStatuses))
                <div class="gap-3 my-10 d-flex justify-content-end">
                    <a href="{{ route('formHandover.detail', $detail->handover_form_id) }}" 
                        class="btn btn-secondary"
                        style="border: 0;">
                         Batalkan
                    </a>
                    <button class="btn btn-primary" type="submit" style="border: 0;" id="submitForm">Simpan Perubahan</button>
                </div>
            @else
                <div class="my-10 d-flex justify-content-end">
                    <button class="btn btn-secondary" disabled title="Laporan  sudah final">Status Tidak Dapat Diubah</button>
                </div>
            @endif
        </form>
    </div>
</div>

<script>
    document.getElementById('submitForm').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission by default

        var statusID = parseInt(document.getElementById('statusID').value);
        var nonEditableStatuses = @json($nonEditableStatuses);

        if(nonEditableStatuses.includes(statusID)) {

            // Show SweetAlert2 confirmation popup
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Jawaban Anda Tidak Dapat Diubah Kembali",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Saya Yakin',
                cancelButtonText: 'Tidak, Kembali',
            }).then((result) => {
                if (result.isConfirmed) {
                    // If "Yes, submit it!" is clicked, submit the form
                    document.getElementById('formHandover').submit();
                }
            });
        } else {

            // Show SweetAlert2 confirmation popup
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Status dapat dilanjutkan ke tahap berikutnya",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Saya Yakin',
                cancelButtonText: 'Tidak, Kembali',
            }).then((result) => {
                if (result.isConfirmed) {
                    // If "Yes, submit it!" is clicked, submit the form
                    document.getElementById('formHandover').submit();
                }
            });
        }
        
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tanggalLahirInput = document.getElementById('bod');
    const usiaUser = document.getElementById('usiaPelapor');

    function calculateAge() {
        const birthDate = new Date(tanggalLahirInput.value);
        const today = new Date();
        
        let ageInMonths = (today.getFullYear() - birthDate.getFullYear()) * 12;
        ageInMonths += today.getMonth() - birthDate.getMonth();
        
        if (today.getDate() < birthDate.getDate()) {
            ageInMonths--;
        }

        let years = Math.floor(ageInMonths / 12);
        let months = ageInMonths % 12;

        if (ageInMonths < 0) {
            years = 0;
            months = 0;
        }

        let ageString = '';
        if (years > 0) {
            ageString += `${years} Tahun `;
        }

        usiaUser.value = ageString;
    }

    if (tanggalLahirInput.value) {
        calculateAge();
    }

    tanggalLahirInput.addEventListener('change', calculateAge);
});
</script>
@endsection