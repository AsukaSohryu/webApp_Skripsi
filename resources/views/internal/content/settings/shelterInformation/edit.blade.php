@extends('internal.layout.dashboard')

@section('content')

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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
        <h1 class="text-center">Data Informasi Shelter</h1>
        <form action="{{ route('informasiShelter.edit.post') }}" method="post" enctype="multipart/form-data" id="formShelter">
            @csrf
            <div class="row my-3">
                <div class="col my-3 d-flex flex-column justify-content-center">
                    <label for="">Upload Logo Shelter</label>
                    <input type="file" class="form-control" name="shelterLogo" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml">
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                    <div class="mt-2 ps-3">Currrent File: {{ $shelterInformation->shelter_logo }}</div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Nama Shelter</label>
                    <input type="text" name="namaShelter" id="namaShelter" value="{{$shelterInformation->shelter_name}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">No Telepon</label>
                    <input type="text" name="noTelepon" id="noTelepon" value="{{$shelterInformation->phone_number}}" class="form-control">
                </div>
                <div class="col">
                    <label for="">No Whatsapp</label>
                    <input type="text" name="noWhatsapp" id="noWhatsapp" value="{{$shelterInformation->whatsapp_number}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Alamat Shelter</label>
                    <input type="text" name="alamatShelter" id="alamatShelter" value="{{$shelterInformation->address}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Email Shelter</label>
                    <input type="text" name="emailShelter" id="emailShelter" value="{{$shelterInformation->email}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Jam Operasional Shelter</label>
                    <textarea name="operationalHour" id="summernote4" class="form-control" rows="4">{{$shelterInformation->operational_hour}}</textarea>
                </div>
            </div>
            {{-- Social Media --}}
            <div class="row my-3">
                <div class="col">
                    <label for="">Link Instagram Shelter</label>
                    <input type="text" name="instagram" id="instagram" value="{{$shelterInformation->instagram}}" class="form-control">
                </div>
                <div class="col">
                    <label for="">Link Facebook Shelter</label>
                    <input type="text" name="facebook" id="facebook" value="{{$shelterInformation->facebook}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Link Twitter Shelter</label>
                    <input type="text" name="twitter" id="twitter" value="{{$shelterInformation->twitter}}" class="form-control">
                </div>
                <div class="col">
                    <label for="">Link Youtube Shelter</label>
                    <input type="text" name="youtube" id="youtube" value="{{$shelterInformation->youtube}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Informasi Donasi</label>
                    <input type="text" name="donationInformation" id="donationInformation" value="{{$shelterInformation->donation_information}}" class="form-control">
                </div>
            </div>
            {{-- Informasi Halaman Tentang Kami --}}
            <div class="row my-3">
                <div class="col my-3 d-flex flex-column justify-content-center">
                    <label for="">Upload Foto Shelter</label>
                    <input type="file" class="form-control" name="shelterPhoto">
                    <div class="mt-2 ps-3">Currrent File: {{ $shelterInformation->shelter_photo }}</div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Informasi Tentang Shelter</label>
                    <textarea name="aboutUs" id="summernote5" class="form-control">{{$shelterInformation->about_shelter}}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Visi Shelter</label>
                    <textarea name="vision" id="summernote6" class="form-control">{{$shelterInformation->vision}}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Misi Shelter</label>
                    <textarea name="mission" id="summernote7" class="form-control">{{$shelterInformation->mission}}</textarea>
                </div>
            </div>
            <h1 class="text-center">Informasi Halaman Tentang Kami</h1>
            <div class="row my-3">
                <div class="col my-3 d-flex flex-column justify-content-center">
                    <label for="">Upload Foto Pendiri</label>
                    <input type="file" class="form-control" name="founderPhoto">
                    <div class="mt-2 ps-3">Currrent File: {{ $shelterInformation->founder_photo }}</div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Nama Pendiri</label>
                    <input type="text" name="fname" id="fname" value="{{$shelterInformation->founder_name}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Informasi Pendiri</label>
                    <textarea name="fdesc" id="summernote8" class="form-control">{{$shelterInformation->founder_description}}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Sejarah Shelter</label>
                    <textarea name="history" id="summernote9" class="form-control">{{$shelterInformation->history}}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Informasi Tambahan</label>
                    <textarea name="addInfo" id="summernote10" class="form-control">{{$shelterInformation->additional_information}}</textarea>
                </div>
            </div>
            {{-- Pengaturan Informasi Formulir --}}
            <h1 class="text-center">Informasi Halaman Formulir</h1>
            <div class="row my-3">
                <div class="col">
                    <label for="">Informasi Formulir Laporan Penemuan Hewan Liar</label>
                    <textarea name="reportInfo" id="summernote1" class="form-control" rows="4">{{$shelterInformation->report_information}}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Informasi Formulir Pengajuan Penyerahan Hewan</label>
                    <textarea name="handoverInfo" id="summernote2" class="form-control" rows="4">{{$shelterInformation->handover_information}}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Informasi Formulir Laporan Penemuan Hewan Liar</label>
                    <textarea name="adoptionInfo" id="summernote3" class="form-control" rows="4">{{$shelterInformation->adoption_information}}</textarea>
                </div>
            </div>

            {{-- Pengaturan Penerimaan Formulir --}}
            <div class="row my-3 p-3">
                <div class="d-flex flex-row justify-content-between p-3" style="background-color: #CADFF2; border-radius: .475rem;">
                    <div class="col d-flex align-items-center">
                        <label for="reportToggle"><b>Status Penerimaan Laporan Penemuan Hewan Liar</b></label>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <input type="hidden" name="is_accepting_report" value="0"> <!-- Hidden input for unchecked state -->
                        <input type="checkbox" id="reportToggle" name="is_accepting_report" value="1" {{ $shelterInformation->is_accepting_report == 1 ? 'checked' : '' }}>
                        <label for="reportToggle" class="button"></label>
                        @if($shelterInformation->is_accepting_report == 1)
                            <label for="" class="ps-3"><b>Aktif</b></label>
                        @else
                            <label for="" class="ps-3"><b>Tidak Aktif</b></label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row my-3 p-3">
                <div class="d-flex flex-row justify-content-between p-3" style="background-color: #CADFF2; border-radius: .475rem;">
                    <div class="col d-flex align-items-center">
                        <label for="handoverToggle"><b>Status Penerimaan Formulir Pengajuan Penyerahan Hewan</b></label>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <input type="hidden" name="is_accepting_handover" value="0"> <!-- Hidden input for unchecked state -->
                        <input type="checkbox" id="handoverToggle" name="is_accepting_handover" value="1" {{ $shelterInformation->is_accepting_handover == 1 ? 'checked' : '' }}>
                        <label for="handoverToggle" class="button"></label>
                        @if($shelterInformation->is_accepting_handover == 1)
                            <label for="" class="ps-3"><b>Aktif</b></label>
                        @else
                            <label for="" class="ps-3"><b>Tidak Aktif</b></label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row my-3 p-3">
                <div class="d-flex flex-row justify-content-between p-3" style="background-color: #CADFF2; border-radius: .475rem;">
                    <div class="col d-flex align-items-center">
                        <label for="adoptionToggle"><b>Status Penerimaan Formulir Pengajuan Pengadopsian Hewan</b></label>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <input type="hidden" name="is_accepting_adoption" value="0"> <!-- Hidden input for unchecked state -->
                        <input type="checkbox" id="adoptionToggle" name="is_accepting_adoption" value="1" {{ $shelterInformation->is_accepting_adoption == 1 ? 'checked' : '' }}>
                        <label for="adoptionToggle" class="button"></label>
                        @if($shelterInformation->is_accepting_adoption == 1)
                            <label for="" class="ps-3"><b>Aktif</b></label>
                        @else
                            <label for="" class="ps-3"><b>Tidak Aktif</b></label>
                        @endif
                    </div>
                </div>
            </div>
            <div class=" my-3 d-flex justify-content-end gap-2">
                <a href="{{ route('informasiShelter.index') }}" class="btn btn-secondary">
                    Batalkan
                </a>
                <button class="btn btn-primary" type="submit" style="border: 0;" id="submitForm">Simpan Perubahan Data Shelter</button>
            </div>            
        </form>
    </div>
</div>

<script>
    $('#summernote1').summernote({
        height: 200,
    });   

    $('#summernote2').summernote({
        height: 200,
    });

    $('#summernote3').summernote({
        height: 200,
    });

    $('#summernote4').summernote({
        height: 200,
    });

    $('#summernote5').summernote({
        height: 200,
    });

    $('#summernote5').summernote({
        height: 200,
    });

    $('#summernote6').summernote({
        height: 200,
    });

    $('#summernote7').summernote({
        height: 200,
    });

    $('#summernote8').summernote({
        height: 200,
    });

    $('#summernote9').summernote({
        height: 200,
    });

    $('#summernote10').summernote({
        height: 200,
    });
</script>

<script>
    document.getElementById('submitForm').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission by default

        // Show SweetAlert2 confirmation popup
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Shelter Dapat Diubah Kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Saya Yakin',
            cancelButtonText: 'Tidak, Kembali',
        }).then((result) => {
            if (result.isConfirmed) {
                // If "Yes, submit it!" is clicked, submit the form
                document.getElementById('formShelter').submit();
            }
        });
    });
</script>

@endsection