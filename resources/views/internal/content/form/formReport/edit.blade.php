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
        <form action="{{ route('formReport.edit.post') }}" method="post" enctype="multipart/form-data" id="formReport">
            <input type="hidden" name="report_form_id" value="{{ $detail->report_form_id }}">
            @csrf
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
                <label for="" class="mb-2">Status Formulir</label>
                <select class="form-control custom-dropdown" id="statusLaporan" name="statusLaporan" required>
                    @foreach($reportFormStatus as $s)
                        <option value="{{ $s->status_id }}" {{ $s->status_id == $detail->status_id ? 'selected' : '' }}>
                            {{ $s->status }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col my-3">
                <label for="" class="mb-2">Respon Admin</label>
                <textarea name="responAdmin" id="responAdmin" class="form-control" rows="4">{{$detail->admin_feedback}}</textarea>
            </div>
            <div class="col my-3">
                <div class="col">
                    <label for="" class="mb-2">Admin Feedback Photo</label>
                    <input type="file" class="form-control" id="fotoResponAdmin" name="fotoResponAdmin" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml">
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                    <div class="mt-2 ps-3">Currrent File: {{ $detail->admin_feedback_photo }}</div>
                </div>
            </div>
            @if(!in_array($detail->status_id, $nonEditableStatuses))
                <div class="gap-3 my-10 d-flex justify-content-end">
                    <a href="{{ route('formReport.detail', $detail->report_form_id) }}" 
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

        var statusID = parseInt(document.getElementById('statusLaporan').value);
        console.log(statusID);

        var nonEditableStatuses = @json($nonEditableStatuses);
        console.log(nonEditableStatuses);

        if (nonEditableStatuses.includes(statusID)) {
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
                    document.getElementById('formReport').submit();
                }
            });
        } else {

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
                    document.getElementById('formReport').submit();
                }
            });
        }
    });
</script>
@endsection