@extends('frontend.layout.layout')

@section('link')

@endsection

@section('content')
<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Pengajuan Pengadopsian Hewan</p>
        <p class="type-2">Detail Hewan Siap Adopsi</p>
    </div>
</section>
<section id="section-1-detail-hewan">
    <div class="container my-3">
        <h3 class="text-center">Detail Hewan: {{$animal->animal_name}}</h3>
        <hr>
    </div>
    <div class="container border border-black my-4 p-4 bg-light" style="border-radius: 16px">
        <div class="row my-3">
            <div class="col my-3 d-flex justify-content-center">
                <img src="{{ asset('storage/animal/' . $animal->photo) }}" alt="" style="width: 200px; height: 200px; border-radius: 15px;">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Nama Hewan</label>
                <input type="text" name="namaHewan" id="namaHewan" value="{{ $animal->animal_name }}" class="form-control text-muted" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Jenis Hewan</label>
                <input type="text" name="jenisHewan" id="jenisHewan" value="{{ $animal->animal_type }}" class="form-control text-muted" readonly>
            </div>
            <div class="col">
                <label for="" class="my-1">Status Hewan</label>
                <input type="text" name="statusHewan" id="statusHewan" value="{{ $animal->status_name }}" class="form-control text-muted" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Detail Status Hewan</label>
                <textarea name="detailStatusHewan" id="detailStatusHewan" rows="3" class="form-control text-muted" readonly>{{ $animal->detail_status }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Usia Hewan</label>
                <input type="text" name="usiaHewan" id="usiaHewan" value="" class="form-control text-muted" readonly>
            </div>
            <div class="col">
                <label for="" class="my-1">Tanggal Lahir</label>
                <input type="text" name="tanggalLahir" id="tanggalLahir" value="{{ $animal->birth_date }}" class="form-control text-muted" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Jenis Kelamin</label>
                <input type="text" name="jenisKelamin" id="jenisKelamin" value="{{ $animal->sex }}" class="form-control text-muted" readonly>
            </div>
            <div class="col">
                <label for="" class="my-1">Ras Hewan</label>
                <input type="text" name="rasHewan" id="rasHewan" value="{{ $animal->race }}" class="form-control text-muted" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Warna Hewan</label>
                <input type="text" name="warnaHewan" id="warnaHewan" value="{{ $animal->color }}" class="form-control text-muted" readonly>
            </div>
            <div class="col">
                <label for="" class="my-1">Berat Hewan</label>
                <input type="text" name="beratHewan" id="beratHewan" value="{{ $animal->weight }}" class="form-control text-muted" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Informasi Vaksin Hewan</label>
                <input type="text" name="informasiVaksinHewan" id="informasiVaksinHewan" value="{{ $animal->vaccine }}" class="form-control text-muted" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Apakah Hewan Sudah Disteril</label>
                <input type="text" name="apakahHewanSudahDisteril" id="apakahHewanSudahDisteril" 
                       value="@if($animal->is_sterile == 1) Sudah
                              @else Belum @endif"  
                       class="form-control text-muted" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Asal Hewan</label>
                <textarea name="asalHewan" id="asalHewan" rows="3" class="form-control text-muted" readonly>{{ $animal->source }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Karakteristik Hewan</label>
                <textarea name="karakteristikHewan" id="karakteristikHewan" rows="3" class="form-control text-muted" readonly>{{ $animal->characteristics }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Deskripsi Hewan</label>
                <textarea name="deskripsiHewan" id="deskripsiHewan" rows="3" class="form-control text-muted" readonly>{{ $animal->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Catatan Medis Hewan</label>
                <textarea name="catatanMedisHewan" id="catatanMedisHewan" rows="3" class="form-control text-muted" readonly>{{ $animal->medical_note }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Tanggal Hewan Masuk Shelter</label>
                <input type="text" name="tanggalHewanMasukShelter" id="tanggalHewanMasukShelter" value="{{ $animal->created_at }}" class="form-control text-muted" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="my-1">Tanggal Data Terakhir Diperbaharui</label>
                <input type="text" name="tanggalDataTerakhirDiperbaharui" id="tanggalDataTerakhirDiperbaharui" value="{{ $animal->updated_at }}" class="form-control text-muted" readonly>
            </div>
        </div>
    </div>
    @if($animal->status_id == $statusAVL)
    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('layanan-adopsi.create', $animal->animal_id ) }}" 
                   class="btn btn-primary px-5 py-2">
                    Isi Formulir Adopsi
                </a>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('layanan-adopsi.create', $animal->animal_id ) }}" 
                   class="btn btn-primary px-5 py-2 disabled">
                    Tidak Bisa Mengajukan Adopsi
                </a>
            </div>
        </div>
    </div>
    @endif


</section>
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

@endsection


@section('js')

@endsection