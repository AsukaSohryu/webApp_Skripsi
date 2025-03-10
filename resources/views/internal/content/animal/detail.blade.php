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
        <h1 class="text-center">Detail Data Hewan</h1>
        <div class="row my-3">
            <div class="col my-3 d-flex justify-content-center">
                <img src="{{ asset('uploadedImages/dataHewan/' . $detail->photo) }}" alt="" style="width: 200px; height: 200px; border-radius: 15px; object-fit: cover;">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">ID Hewan</label>
                <input type="text" name="idHewan" id="idHewan" value="{{$detail->animal_id}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="" class="my-3">Nama Hewan</label>
                <input type="text" name="namaHewan" id="namaHewan" value="{{$detail->animal_name}}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Jenis Hewan</label>
                <input type="text" name="jenisHewan" id="jenisHewan" value="{{$detail->animal_type}}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="" class="my-3">Status Hewan</label>
                <input type="text" name="statusHewan" id="statusHewan" value="{{ $animalStatus }}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Detail Status Hewan</label>
                <textarea type="text" name="detailStatusHewan" id="detailStatusHewan" class="form-control" disabled>{{ $detail->detail_status }}</textarea>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Usia Hewan</label>
               <input type="text" name="usiaHewan" id="usiaHewan" value="" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="" class="my-3">Tanggal Lahir</label>
                <input type="date" name="tanggalLahir" id="tanggalLahir" value="{{ $detail->birth_date }}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Jenis Kelamin</label>
                <input type="text" name="jenisKelamin" id="jenisKelamin" value="{{ $detail->sex }}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="" class="my-3">Ras Hewan</label>
                <input type="text" name="rasHewan" id="rasHewan" value="{{ $detail->race }} Kg" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Warna Hewan</label>
                <input type="text" name="warnaHewan" id="warnaHewan" value="{{ $detail->color }}" class="form-control" disabled>
            </div>
            <div class="col">
                <label for="" class="my-3">Berat Hewan</label>
                <input type="text" name="beratHewan" id="beratHewan" value="{{ $detail->weight }} Kg" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Informasi Vaksin Hewan</label>
                <input type="text" name="informasiVaksin" id="informasiVaksin" value="{{ $detail->vaccine }}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Hewan Sudah Disteril</label>
                @if($detail->is_sterile == 1)
                <input type="text" name="sterilHewan" id="sterilHewan" value="Sudah" class="form-control" disabled>
                @else
                <input type="text" name="sterilHewan" id="sterilHewan" value="Belum" class="form-control" disabled>
                @endif
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Asal Hewan</label>
                <input type="text" name="asalHewan" id="asalHewan" value="{{ $detail->source }}" class="form-control" disabled>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Karakteristik Hewan</label>
                <textarea type="text" name="karakteristikHewan" id="karakteristikHewan" class="form-control" disabled>{{ $detail->characteristics }}</textarea>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Deskripsi Hewan</label>
                <textarea type="text" name="deskripsiHewan" id="deskripsiHewan" class="form-control" disabled>{{ $detail->description }}</textarea>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <label for="" class="my-3">Catatan Medis Hewan</label>
                <textarea type="text" name="catatanMedisHewan" id="catatanMedisHewan" class="form-control" disabled>{{ $detail->medical_note }}</textarea>
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
                <input type="text" name="tanggalMasuk" id="tanggalMasuk" value="{{ $detail->updated_at }}" class="form-control" disabled>
            </div>
        </div> 
        <div class="row my-3 p-3">
            <div class="d-flex flex-row justify-content-between p-3" style="background-color: #CADFF2; border-radius: .475rem;">
                <div class="col d-flex align-items-center">
                    <label for="" class="my-3"><b>Pengaturan data hewan aktif atau tidak</b></label>
                </div>
                <div class="col d-flex align-items-center justify-content-end">
                    <input type="checkbox" id="check" {{ $detail->is_active == 1 ? 'checked' : '' }} disabled>
                    <label for="check" class="button"></label>
                    @if($detail->is_active == 1)
                        <label for="" class="my-3 ps-3"><b>Aktif</b></label>
                    @else
                        <label for="" class="my-3 ps-3"><b>Tidak Aktif</b></label>
                    @endif
                </div>
            </div>
        </div>
        <div class=" my-3 d-flex justify-content-end">
            <form action="{{ route('dataHewan.edit', $detail->animal_id) }}" method="get">
                <button class="btn btn-primary" style="border: 0;" title="Edit" id="editAnimal">Ubah Data Hewan</button>
            </form>
        </div>
    </div>
</div>
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
    document.getElementById('editAnimal').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission by default

        // Show SweetAlert2 confirmation popup
        Swal.fire({
            title: 'Apakah Anda Ingin Mengubah Data Hewan Ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Lanjutkan',
            cancelButtonText: 'Tidak, Kembali',
        }).then((result) => {
            if (result.isConfirmed) {
                // If "Yes, submit it!" is clicked, submit the form
                window.location.href = '{{ route('dataHewan.edit', $detail->animal_id) }}';
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
@endsection