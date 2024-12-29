@extends('frontend.layout.layout')

@section('content')
<style>
    .card-link {
        text-decoration: none;
        color: inherit;
    }
    .card-link:hover {
        text-decoration: none;
        color: inherit;
    }
    .card-link .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card-link .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        cursor: pointer;
    }
</style>

<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Hewan Yang Telah Diselamatkan</p>
    </div>
</section>

<section id="section-1-hewan-diselamatkan">
    <div class="container">
        <h1 class="text-center">Hewan Yang Telah Diselamatkan</h1>
        <hr />
    </div>
    <div class="container">
        @foreach($animals as $animal)
            <div class="card mb-3">
                <a href="{{ route('layanan-adopsi.detail', $animal->animal_id ) }}" class="card-link">
                    <div class="row align-items-center justify-content-between">
                        <div class="col align-items-left p-0">
                            <div class="d-flex justify-content-center justify-content-md-center align-items-center h-100 m-0 p-0">
                                <img src="{{ asset('storage/animal/' . $animal->photo) }}" 
                                    class="img-fluid rounded-start w-100 m-0" 
                                    alt="Foto Hewan"
                                    style="object-fit: cover; max-width: 300px;">
                            </div>
                        </div>
                        <div class="col-md-9 h-100">
                            <div class="card-body p-0 m-0 ms-2">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title d-flex align-items-center mb-0">
                                        {{ \Carbon\Carbon::parse($animal->created_at)->format('d M Y') }}
                                    </h5>
                                    <div class="alert 
                                    @if($animal->status_id == 16)
                                        alert-warning
                                    @elseif($animal->status_id == 17)
                                        alert-warning
                                    @elseif($animal->status_id == 18)
                                        alert-warning
                                    @else
                                        alert-danger
                                    @endif py-2 px-1 mb-0">
                                        Status: 
                                        @if($animal->status_id == 16)
                                            Baru Diselamatkan
                                        @elseif($animal->status_id == 17)
                                            Dalam Perawatan
                                        @elseif($animal->status_id == 18)
                                            Siap Untuk Diadopsi
                                        @else
                                            Tidak Tersedia
                                        @endif
                                    </div>
                                </div>
                                <p class="card-text">Nama Hewan: {{ $animal->animal_name }}</p>
                                <p class="card-text">Jenis Hewan: {{ $animal->animal_type }}</p>
                                <p class="card-text">Lokasi Ditemukan: {{ $animal->source }}</p>
                                <div class="border border-black p-3 me-3 my-3">
                                    <p class="mb-2 fw-bold">Deskripsi Hewan: </p>
                                    <p class="mb-0">{{ $animal->description ?? 'Belum ada Deskripsi' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    
        @if($animals->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada hewan yang diselamatkan
            </div>
        @endif
    </div>
</section>
@endsection