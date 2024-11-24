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
    .custom-dropdown {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg"><polyline points="30,50 70,90 110,50" stroke="black" stroke-width="10" fill="none"/></svg>') no-repeat right center;
        background-size: 20px; /* Add padding to make room for the arrow */
        background-position: calc(100% - 10px) center; /* Adjust the position here */
        padding-right: 40px;
        width: calc(100% - 0px);
        box-sizing: border-box;
    }
</style>
    
<div class="card mb-5 mb-xxl-8">
    @php
        $steril = [
            0 => 'Belum',
            1 => 'Sudah',
        ];
    @endphp
    <div class="card-body py-9">
        <h1 class="text-center">Detail Data Hewan</h1>
        <form action="{{ route('dataHewan.edit.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row my-3">
                <div class="col my-3 d-flex flex-column justify-content-center">
                    <input type="file" class="form-control" name="fotoHewan">
                    <div class="mt-2 ps-3">Currrent File: {{ $detail->photo }}</div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">ID Hewan</label>
                    <input type="text" value="{{$detail->animal_id}}" class="form-control" disabled>
                    <input type="hidden" name="idHewan" id="idHewan" value="{{$detail->animal_id}}" class="form-control">
                </div>
                <div class="col">
                    <label for="" class="my-3">Nama Hewan</label>
                    <input type="text" name="namaHewan" id="namaHewan" value="{{$detail->animal_name}}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Jenis Hewan</label>
                    <input type="text" name="jenisHewan" id="jenisHewan" value="{{$detail->animal_type}}" class="form-control">
                </div>
                <div class="col">
                    <label for="" class="my-3">Usia Hewan</label>
                    <input type="text" name="usiaHewan" id="usiaHewan" value="{{ $detail->age }}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Status Hewan</label>
                    <select class="form-control custom-dropdown" id="statusID" name="statusID" required>
                        @foreach($status as $s)
                            <option value="{{ $s->status_id }}" {{ $s->status_id == $detail->status_id ? 'selected' : '' }}>
                                {{ $s->status }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="col">
                    <label for="" class="my-3">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" value="{{ $detail->birth_date }}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Warna Hewan</label>
                    <input type="text" name="warnaHewan" id="warnaHewan" value="{{ $detail->color }}" class="form-control">
                </div>
                <div class="col">
                    <label for="" class="my-3">Berat Hewan</label>
                    <input type="text" name="beratHewan" id="beratHewan" value="{{ $detail->weight }}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Informasi Vaksin Hewan</label>
                    <input type="text" name="informasiVaksin" id="informasiVaksin" value="{{ $detail->vaccine }}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Hewan Sudah Disteril</label>
                    <select class="form-control custom-dropdown" id="sterile" name="sterile" required>
                        @foreach ($steril as $key => $value)
                            <option value="{{ $key }}" {{ old('sterile', $detail->is_sterile) == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Asal Hewan</label>
                    <input type="text" name="asalHewan" id="asalHewan" value="{{ $detail->source }}" class="form-control">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Karakteristik Hewan</label>
                    <textarea type="text" name="karakteristikHewan" id="karakteristikHewan" class="form-control">{{ $detail->characteristics }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Deskripsi Hewan</label>
                    <textarea type="text" name="deskripsiHewan" id="deskripsiHewan" class="form-control">{{ $detail->description }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Catatan Medis Hewan</label>
                    <textarea type="text" name="catatanMedisHewan" id="catatanMedisHewan" class="form-control">{{ $detail->medical_note }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Tanggal Hewan Masuk Shelter</label>
                    <input type="text" name="tanggalMasuk" id="tanggalMasuk" value="{{ $detail->created_at }}" class="form-control" disabled>
                </div>
            </div> 
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Tanggal Data Terakhir Diperbaharui</label>
                    <input type="text" name="tanggalUpdate" id="tanggalUpdate" value="{{ $detail->updated_at }}" class="form-control" disabled>
                </div>
            </div> 
            <div class="row my-3 p-3">
                <div class="d-flex flex-row justify-content-between p-3" style="background-color: #CADFF2; border-radius: .475rem;">
                    <div class="col d-flex align-items-center">
                        <label for=""><b>Pengaturan data hewan aktif atau tidak</b></label>
                    </div>
                    <div class="col d-flex align-items-center justify-content-end">
                        <input type="hidden" name="activeStatus" value="0">
                        <input 
                        type="checkbox" 
                        id="check" 
                        name="activeStatus"
                        value="1"
                        {{ $detail->is_active == 1 ? 'checked' : '' }}>
                        <label for="check" class="button"></label>
                        <label for="" class="ps-3" id="isActive">
                            <b>{{ $detail->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</b>
                        </label>
                    </div>
                </div>
            </div>
            <div class=" my-3 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit" style="border: 0;">Simpan Data Hewan</button>
            </div>
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
            <a href="{{ route('dataHewan.detail', $detail->animal_id ) }}" type="button" class="btn btn-secondary" data-dismiss="modal">kembali</a>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkbox = document.getElementById('check');
        const isActiveLabel = document.getElementById('isActive');

        // Update label on page load based on checkbox state
        if (checkbox.checked) {
            isActiveLabel.innerHTML = '<b>Aktif</b>';
        } else {
            isActiveLabel.innerHTML = '<b>Tidak Aktif</b>';
        }

        // Add event listener to handle checkbox state change
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                isActiveLabel.innerHTML = '<b>Aktif</b>';
            } else {
                isActiveLabel.innerHTML = '<b>Tidak Aktif</b>';
            }
        });
    });
</script>

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