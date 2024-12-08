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
        <h1 class="text-center">Data Informasi Shelter</h1>
        <div class="row my-3">
            <div class="col my-3 d-flex justify-content-center">
                <img src="{{ asset('storage/informasiShelter/' . $shelterInformation->shelter_logo) }}" alt="" style="width: 200px; height: 200px; border-radius: 15px;">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Nama Shelter</label>
                <input type="text" name="namaShelter" id="namaShelter" value="{{$shelterInformation->shelter_name}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">No Telepon</label>
                <input type="text" name="noTelepon" id="noTelepon" value="{{$shelterInformation->phone_number}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">No Whatsapp</label>
                <input type="text" name="noWhatsapp" id="noWhatsapp" value="{{$shelterInformation->whatsapp_number}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Alamat Shelter</label>
                <input type="text" name="alamatShelter" id="alamatShelter" value="{{$shelterInformation->address}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Email Shelter</label>
                <input type="text" name="emailShelter" id="emailShelter" value="{{$shelterInformation->email}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Jam Operasional Shelter</label>
                <textarea name="operationalHour" id="operationalHour" class="form-control" rows="4" disabled>{{$shelterInformation->operational_hour}}</textarea>
            </div>
        </div>
        {{-- Social Media --}}
        <div class="row my-3">
            <div class="col">
                <label for="">Link Instagram Shelter</label>
                <input type="text" name="instagram" id="instagram" value="{{$shelterInformation->instagram}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">Link Facebook Shelter</label>
                <input type="text" name="facebook" id="facebook" value="{{$shelterInformation->facebook}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Link Twitter Shelter</label>
                <input type="text" name="twitter" id="twitter" value="{{$shelterInformation->twitter}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="">Link Youtube Shelter</label>
                <input type="text" name="youtube" id="youtube" value="{{$shelterInformation->youtube}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Informasi Donasi</label>
                <input type="text" name="donationInformation" id="donationInformation" value="{{$shelterInformation->donation_information}}" class="form-control" disabled>
            </div>
        </div>
        {{-- Informasi Halaman Tentang Kami --}}
        <div class="row my-3">
            <div class="col my-3 d-flex justify-content-center">
                <img src="{{ asset('storage/informasiShelter/' . $shelterInformation->shelter_photo) }}" alt="" style="width: 200px; height: 200px; border-radius: 15px;">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Informasi Tentang Shelter</label>
                <textarea name="aboutUs" id="aboutUs" class="form-control" rows="4" disabled>{{$shelterInformation->about_shelter}}</textarea>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Visi Shelter</label>
                <textarea name="vision" id="vision" class="form-control" rows="4" disabled>{{$shelterInformation->vision}}</textarea>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Misi Shelter</label>
                <textarea name="mission" id="mission" class="form-control" rows="4" disabled>{{$shelterInformation->mission}}</textarea>
            </div>
        </div>
        <h1 class="text-center">Informasi Halaman Tentang Kami</h1>
        <div class="row my-3">
            <div class="col my-3 d-flex justify-content-center">
                <img src="{{ asset('storage/informasiShelter/' . $shelterInformation->founder_photo) }}" alt="" style="width: 200px; height: 200px; border-radius: 15px;">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Nama Pendiri</label>
                <input type="text" name="fname" id="fname" value="{{$shelterInformation->founder_name}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Deskripsi Pendiri</label>
                <textarea name="fdesc" id="fdesc" class="form-control" rows="4" disabled>{{$shelterInformation->founder_description}}</textarea>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Sejarah Shelter</label>
                <textarea name="history" id="history" class="form-control" rows="4" disabled>{{$shelterInformation->history}}</textarea>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Informasi Tambahan</label>
                <textarea name="addInfo" id="addInfo" class="form-control" rows="4" disabled>{{$shelterInformation->additional_information}}</textarea>
            </div>
        </div>
        {{-- Pengaturan Informasi Formulir --}}
        <h1 class="text-center">Informasi Halaman Formulir</h1>
        <div class="row my-3">
            <div class="col">
                <label for="">Informasi Formulir Laporan Penemuan Hewan Liar</label>
                <textarea name="reportInfo" id="reportInfo" class="form-control" rows="4" disabled>{{$shelterInformation->report_information}}</textarea>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Informasi Formulir Pengajuan Penyerahan Hewan</label>
                <textarea name="handoverInfo" id="handoverInfo" class="form-control" rows="4" disabled>{{$shelterInformation->handover_information}}</textarea>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="">Informasi Formulir Lpaoran Penemuan Hewan Liar</label>
                <textarea name="adoptionInfo" id="adoptionInfo" class="form-control" rows="4" disabled>{{$shelterInformation->adoption_information}}</textarea>
            </div>
        </div>

        {{-- Pengaturan Penerimaan Formulir --}}
        <div class="row my-3 p-3">
            <div class="d-flex flex-row justify-content-between p-3" style="background-color: #CADFF2; border-radius: .475rem;">
                <div class="col d-flex align-items-center">
                    <label for=""><b>Status Penerimaan Laporan Penemuan Hewan Liar</b></label>
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <input type="checkbox" id="check" {{ $shelterInformation->is_accepting_report == 1 ? 'checked' : '' }} disabled>
                    <label for="check" class="button"></label>
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
                    <label for=""><b>Status Penerimaan Formulir Pengajuan Penyerahan Hewan</b></label>
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <input type="checkbox" id="check" {{ $shelterInformation->is_accepting_handover == 1 ? 'checked' : '' }} disabled>
                    <label for="check" class="button"></label>
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
                    <label for=""><b>Status Penerimaan Formulir Pengajuan Pengadopsian Hewan</b></label>
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <input type="checkbox" id="check" {{ $shelterInformation->is_accepting_adoption == 1 ? 'checked' : '' }} disabled>
                    <label for="check" class="button"></label>
                    @if($shelterInformation->is_accepting_adoption == 1)
                        <label for="" class="ps-3"><b>Aktif</b></label>
                    @else
                        <label for="" class="ps-3"><b>Tidak Aktif</b></label>
                    @endif
                </div>
            </div>
        </div>
        <div class=" my-3 d-flex justify-content-end">
            <form action="{{ route('informasiShelter.edit', 1) }}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengubah Informasi Shelter?');">
                <button class="btn btn-primary" style="border: 0;" title="Edit">Ubah Informasi Shelter</button>
            </form>
        </div>
    </div>
</div>
@endsection