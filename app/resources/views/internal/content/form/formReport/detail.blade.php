@extends('internal.layout.dashboard')

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
    .image {
        width: 180px;
        height: 180px;
        border-radius: 15px;
        object-fit: cover;
        border-color: #dee2e6 !important;
    }
    .image-placeholder {
        width: 180px;
        height: 180px;
        border-radius: 15px;
        border-color: #dee2e6 !important;
    }
</style>

@section('content')
<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <div class="d-flex my-3 justify-content-between align-items-center mb-10 mt-5">
            <div class="flex-grow-1">
                <h1 class="text-center">Formulir Laporan Penemuan Hewan Peliharaan Liar</h1>
            </div>
        </div>
        <div class="row my-3 d-flex flex-row flex-wrap justify-content-center g-2" style="gap: 8px;">
            <div class="col-3 d-flex justify-content-center">
                <img src="@if($detail->admin_feedback_photo) 
                        {{ asset('uploadedImages/laporanPenemuan/responAdmin/' . $detail->admin_feedback_photo) }}
                    @else
                        {{ asset('uploadedImages/laporanPenemuan/fotoHewan/' . $detail->animal_photo) }}
                    @endif"
                alt="Foto Hewan" 
                class="border border-2 report-image img-fluid" 
                style="height: 200px; object-fit: cover;">
            </div>
            <div class="col-3 d-flex justify-content-center">
                <img src="{{ asset('uploadedImages/laporanPenemuan/fotoLokasi/' . $detail->location_photo) }}" alt="Foto Lokasi" class="border border-2 report-image img-fluid" style="height: 200px; object-fit: cover;">
            </div>
            <div class="col-3 d-flex justify-content-center">
                @if($detail->additional_photo)
                    <img src="{{ asset('uploadedImages/laporanPenemuan/fotoTambahan/' . $detail->additional_photo) }}" alt="Foto Tambahan" class="border border-2 report-image img-fluid" style="height: 200px; object-fit: cover;">
                @else
                    <div class="border border-2 d-flex align-items-center justify-content-center image-placeholder" style="height: 200px;">
                        <span style="color: #6c757d">Foto Tambahan</span>
                    </div>
                @endif
            </div>
        </div>
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
        <div class="col my-3">
            <label for="" class="mb-2">Jenis Hewan</label>
            <input type="text" name="jenisHewan" id="jenisHewan" value="{{$detail->animal_type}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" value="{{$detail->location}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Lokasi Google Maps</label>
            <div class="form-control bg-light d-flex align-items-center">
                <a href="{{$detail->location_map}}" target="_blank" class="text-muted text-decoration-none overflow-hidden" rel="noopener noreferrer">{{$detail->location_map}}</a>
            </div>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" disabled>{{$detail->description}}</textarea>
        </div>
        <hr>
        <div class="col my-3">
            <label for="" class="mb-2">Tanggal Formulir Dibuat</label>
            <input type="text" name="tanggalLaporanDibuat" id="tanggalLaporanDibuat" value="{{$detail->created_at}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Tanggal Formulir Terakhir Diperbaharui</label>
            <input type="text" name="tanggalLaporanDiperbaharui" id="tanggalLaporanDiperbaharui" value="{{$detail->updated_at}}" class="form-control" disabled>
        </div>
        <div class="col my-3">
            <div class="col">
                <label for="">Status Formulir</label>
                <input type="text" name="statusLaporan" id="statusLaporan" value="{{$detail->status->status}}" class="form-control" disabled>
            </div>
        </div>
        <div class="col my-3">
            <label for="" class="mb-2">Respon Admin</label>
            <textarea name="responAdmin" id="responAdmin" class="form-control" rows="4" disabled>{{$detail->admin_feedback}}</textarea>
        </div>
        @if(!in_array($detail->status_id, $nonEditableStatuses))
            <div class="my-10 d-flex justify-content-end">
                <form action="{{ route('formReport.edit', $detail->report_form_id) }}" method="get">
                    <button class="btn btn-primary" style="border: 0;" title="Edit" id="editForm">Ubah Data Formulir</button>
                </form>
            </div>
        @else
            <div class="my-10 d-flex justify-content-end">
                <button class="btn btn-secondary" disabled title="Laporan  sudah final">Status Tidak Dapat Diubah</button>
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
                window.location.href = '{{ route('formReport.edit', $detail->report_form_id) }}';
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