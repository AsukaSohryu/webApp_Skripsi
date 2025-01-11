@extends('internal.layout.dashboard')

@section('content')
<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <h1 class="text-center">Formulir Pengajuan Pengadopsian Hewan Peliharaan</h1>
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
            <form action="{{ route('formAdopsi.edit', $detail->adoption_form_id) }}" method="get">
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
                window.location.href = '{{ route('formAdopsi.edit', $detail->adoption_form_id) }}';
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