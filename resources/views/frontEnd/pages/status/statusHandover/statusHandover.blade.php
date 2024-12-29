@extends('frontend.layout.layout')

@section('link')

@endsection

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

<section id="hero" style='height: 72vh; background-image: url("./assets/images/tentangKami/1148760.jpg"); background-position: center;'>
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Status</p>
        <p class="type-2">Status Laporan Pengajuan Penyerahan Hewan</p>
    </div>
</section>

<section id="section-1-status-penemuan">
    <div class="container">
        <h4 class="text-center">Status Laporan Pengajuan Penyerahan Hewan</h4>
        <hr>
    </div>
    <div class="container">
        @foreach($handovers as $item)
            <div class="card mb-3">
                <div class="row align-items-center justify-content-between">
                    <div class="col align-items-left mx-auto">
                        <div class="d-flex justify-content-center justify-content-md-center align-items-center h-100 m-0 p-0">
                            <img src="{{ asset('storage/formHandover/' . $item->photo) }}" 
                                class="img-fluid rounded-start w-100 m-0" 
                                alt="Foto Hewan"
                                style="object-fit: cover; max-width: 300px;">
                        </div>
                    </div>
                    <div class="col-md-9 h-100">
                        <div class="card-body p-0 m-0 ms-2">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title d-flex align-items-center mb-0">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </h5>
                                <div class="alert 
                                @if($item->status_id == 6)
                                    alert-warning
                                @elseif($item->status_id == 7)
                                    alert-warning
                                @elseif($item->status_id == 8)
                                    alert-danger
                                @elseif($item->status_id == 9)
                                    alert-success
                                @else
                                    alert-danger
                                @endif
                                py-2 px-1 mb-0">
                                    Status: 
                                    @if($item->status_id == 6)
                                        Penyerahan Diajukan
                                    @elseif($item->status_id == 7)
                                        Pengajuan Penyerahan Disetujui
                                    @elseif($item->status_id == 8)
                                        Pengajuan Penyerahan Ditolak
                                    @elseif($item->status_id == 9)
                                        Penyerahan Berhasil
                                    @else
                                        Penyerahan Dibatalkan
                                    @endif
                                </div>
                                
                            </div>
                            <p class="card-text">Nama Hewan: {{ $item->handoverQuestions->where('handover_questions_id', 1)->first()->pivot->answer }}</p>
                            <p class="card-text">Jenis Hewan: {{ $item->handoverQuestions->where('handover_questions_id', 2)->first()->pivot->answer }}</p>
                            
                            <div class="border border-black p-3 me-3 my-3">
                                <p class="mb-2 fw-bold">Catatan Admin: </p>
                                <p class="mb-0">{{ $item->admin_feedback ?? 'Belum ada catatan' }}</p>
                            </div>
                            <div class="d-flex justify-content-end gap-2 me-3 mb-3">
                                <a href="{{ route('status-penyerahan.detail', $item->handover_form_id) }}" class="btn btn-primary">Detail Formulir Handover</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        @endforeach

        @if($handovers->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada pengajuan penyerahan yang dibuat
            </div>
        @endif
    </div>
</section>
@endsection

@section('js')

@endsection