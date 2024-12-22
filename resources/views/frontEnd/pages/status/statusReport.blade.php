@extends('frontend.layout.layout')

@section('link')

@endsection

@section('content')
<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="hero" style='height: 72vh; background-image: url("./assets/images/tentangKami/1148760.jpg"); background-position: center;'>
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Status</p>
        <p class="type-2">Status Laporan Penemuan Hewan Liar</p>
    </div>
</section>

<section id="section-1-status-penemuan">
    <div class="container">
        <h1 class="text-center">Status Laporan Penemuan Hewan Liar</h1>
        <hr>
    </div>
    <div class="container">
        @foreach($report as $item)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        @if($item->photo_animal)
                            <img src="{{ asset('storage/report-photos/' . $item->photo_animal) }}" 
                                class="img-fluid rounded-start" 
                                alt="Foto Hewan"
                                style="height: 300px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                style="height: 300px;">
                                <span class="text-muted">No Image</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Tanggal: {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</h5>
                            <p class="card-text">Alamat: {{ $item->location }}</p>
                            <br />
                            <p class="card-text">Jenis Hewan: {{ $item->animal_type }}</p>
                            <p class="card-text">Deskripsi Hewan: {{ $item->description }}</p>
                            <br />
                            <div class="border border-black p-3">
                                <p class="mb-2 fw-bold">Respon Admin: </p>
                                <p class="mb-0">{{ $item->admin_response ?? 'Belum ada respon' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if($report->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada laporan yang dibuat
            </div>
        @endif
    </div>
</section>
@endsection

@section('js')

@endsection