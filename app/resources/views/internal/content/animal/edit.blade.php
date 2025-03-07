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
        <h1 class="text-center">Ubah Data Hewan</h1>
        <form action="{{ route('dataHewan.edit.post') }}" method="post" enctype="multipart/form-data" id="formAnimal">
            @csrf
            <div class="row my-3">
                <div class="col my-3 d-flex flex-column justify-content-center">
                    <input type="file" class="form-control" name="fotoHewan" accept=".jpg,.jpeg,.png,.svg,image/jpeg,image/png,image/svg+xml">
                    <small class="form-text text-muted">Format file yang diterima: .jpg, .jpeg, .png, .svg</small>
                    <div class="mt-2 ps-3">Currrent File: {{ $detail->photo }}</div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">ID Hewan</label>
                    <input type="text" value="{{$detail->animal_id}}" class="form-control" disabled>
                    <input type="hidden" name="idHewan" id="idHewan" value="{{$detail->animal_id}}" class="form-control" required>
                </div>
                <div class="col">
                    <label for="" class="my-3">Nama Hewan</label>
                    <input type="text" name="namaHewan" id="namaHewan" value="{{$detail->animal_name}}" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Jenis Hewan</label>
                    <select name="jenisHewan" id="jenisHewan" class="form-select" required>
                        <option value="Anjing" {{ $detail->animal_type == 'Anjing' ? 'selected' : '' }}>Anjing</option>
                        <option value="Kucing" {{ $detail->animal_type == 'Kucing' ? 'selected' : '' }}>Kucing</option>
                    </select>
                </div>
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
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Detail Status Hewan</label>
                    <textarea type="text" name="detailStatusHewan" id="detailStatusHewan" class="form-control" required>{{ $detail->detail_status }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Usia Hewan</label>
                   <input type="text" name="usiaHewan" id="usiaHewan" value="" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-3">Tanggal Lahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" value="{{ $detail->birth_date }}" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Jenis Kelamin</label>
                    <select name="jenisKelamin" id="jenisKelamin" class="form-select" required>
                        <option value="Jantan" {{ $detail->sex == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                        <option value="Betina" {{ $detail->sex == 'Betina' ? 'selected' : '' }}>Betina</option>
                    </select>
                </div>
                <div class="col">
                    <label for="" class="my-3">Ras Hewan</label>
                    <input type="text" name="rasHewan" id="rasHewan" value="{{ $detail->race }}" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Warna Hewan</label>
                    <input type="text" name="warnaHewan" id="warnaHewan" value="{{ $detail->color }}" class="form-control" required>
                </div>
                <div class="col">
                    <label for="" class="my-3">Berat Hewan (Kg)</label>
                    <input type="number" name="beratHewan" id="beratHewan" value="{{ $detail->weight }}" class="form-control" step="0.01" min="0" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Informasi Vaksin Hewan</label>
                    <input type="text" name="informasiVaksin" id="informasiVaksin" value="{{ $detail->vaccine }}" class="form-control" required>
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
                    <input type="text" name="asalHewan" id="asalHewan" value="{{ $detail->source }}" class="form-control" required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Karakteristik Hewan</label>
                    <textarea type="text" name="karakteristikHewan" id="karakteristikHewan" class="form-control" required>{{ $detail->characteristics }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Deskripsi Hewan</label>
                    <textarea type="text" name="deskripsiHewan" id="deskripsiHewan" class="form-control" required>{{ $detail->description }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="" class="my-3">Catatan Medis Hewan</label>
                    <textarea type="text" name="catatanMedisHewan" id="catatanMedisHewan" class="form-control" required>{{ $detail->medical_note }}</textarea>
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
            <div class="gap-3 my-10 d-flex justify-content-end">
                <a href="{{ route('dataHewan.detail', $detail->animal_id) }}" 
                    class="btn btn-secondary"
                    style="border: 0;">
                     Batalkan
                </a>
                <button class="btn btn-primary" type="submit" style="border: 0;" id="submitForm">Simpan Perubahan</button>
            </div>
        </form>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tanggalLahirInput = document.getElementById('tanggalLahir');
    const usiaHewanInput = document.getElementById('usiaHewan');

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
        if (months > 0 || years === 0) {
            ageString += `${months} Bulan`;
        }
        if (years === 0 && months === 0) {
            ageString = '0 Bulan';
        }

        usiaHewanInput.value = ageString;
    }

    if (tanggalLahirInput.value) {
        calculateAge();
    }

    tanggalLahirInput.addEventListener('change', calculateAge);
});
</script>

<script>
    document.getElementById('submitForm').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission by default

        // Show SweetAlert2 confirmation popup
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Hewan Dapat Diubah Kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Saya Yakin',
            cancelButtonText: 'Tidak, Kembali',
        }).then((result) => {
            if (result.isConfirmed) {
                // If "Yes, submit it!" is clicked, submit the form
                document.getElementById('formAnimal').submit();
            }
        });
    });
</script>

@endsection