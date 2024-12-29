@extends('internal.layout.dashboard')

@section('content')
<style>
    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        z-index: 10;
    }

    .carousel-control-prev {
        left: -20px;
    }

    .carousel-control-next {
        right: -20px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 20px;
        height: 20px;
    }

    .carousel {
        position: relative;
        overflow: visible;
    }
</style>
<div class="container">
    {{-- <div class="row mb-4">
        <div class="col-md-10">
            <div class="input-group">
                <input type="text" class="form-control rounded-1" id="searchForm" placeholder="Pencarian" onkeyup="searchForms()">
            </div>
        </div>
    </div> --}}

    <div class="row">
        <!-- Reports Carousel -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header align-items-center">
                    <h5 class="mb-0">Laporan Penemuan Baru</h5>
                </div>
                <div class="card-body">
                    <div id="reportsCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse($unreadReports as $report)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <span class="badge bg-info mb-2">Laporan Penemuan</span>
                                            <h6>{{ \Carbon\Carbon::parse($report->created_at)->format('d M Y H:i') }}</h6>
                                            <p>Lokasi: {{ $report->location }}</p>
                                            <a href="{{ route('formReport.detail', $report->report_form_id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <p class="text-center">Tidak ada laporan baru</p>
                                </div>
                            @endforelse
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#reportsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#reportsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Adoptions Carousel -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header align-items-center">
                    <h5 class="mb-0">Pengajuan Adopsi Baru</h5>
                </div>
                <div class="card-body">
                    <div id="adoptionsCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse($unreadAdoptions as $adoption)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <span class="badge bg-success mb-2">Pengajuan Adopsi</span>
                                            <h6>{{ \Carbon\Carbon::parse($adoption->created_at)->format('d M Y H:i') }}</h6>
                                            <p>Pengadopsi: {{ $adoption->users->name }}</p>
                                            <a href="{{ route('formAdopsi.detail', $adoption->adoption_form_id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <p class="text-center">Tidak ada pengajuan adopsi baru</p>
                                </div>
                            @endforelse
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#adoptionsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#adoptionsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Handovers Carousel -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header align-items-center">
                    <h5 class="mb-0">Penyerahan Hewan Baru</h5>
                </div>
                <div class="card-body">
                    <div id="handoversCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse($unreadHandovers as $handover)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <span class="badge bg-warning mb-2">Penyerahan Hewan</span>
                                            <h6>{{ \Carbon\Carbon::parse($handover->created_at)->format('d M Y H:i') }}</h6>
                                            <p>Penyerah: {{ $handover->users->name }}</p>
                                            <a href="{{ route('formHandover.detail', $handover->handover_form_id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="carousel-item active">
                                    <p class="text-center">Tidak ada penyerahan hewan baru</p>
                                </div>
                            @endforelse
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#handoversCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#handoversCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection