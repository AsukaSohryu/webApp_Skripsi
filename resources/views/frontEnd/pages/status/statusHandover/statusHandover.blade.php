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

<section id="hero" style="height: 76vh; background-image: url('{{ asset('assets/images/layananKami/Dog_Human_1.jpg') }}'); background-position: center;">
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Riwayat Laporan Dan Pengajuan</p>
        <p class="type-2">Riwayat Pengajuan Penyerahan Hewan Peliharaan</p>
    </div>
</section>

<section id="section-1-status-penemuan">
    <div class="container">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Riwayat Pengajuan Penyerahan Hewan Peliharaan</h1>
            <hr>
        </div>
    </div>
    <div class="container">
        @foreach($handovers as $item)
            <div class="card mb-3" style="border-radius: 8px;">
                <div class="row align-items-center justify-content-between">
                    <div class="col align-items-left p-0">
                        <div class="d-flex justify-content-center justify-content-md-center align-items-center h-100 p-0">
                            <img src="{{ asset('uploadedImages/layananPenyerahan/fotoHewan/' . $item->photo) }}" 
                                class="img-fluid rounded-start w-100 m-0" 
                                alt="Foto Hewan"
                                style="object-fit: cover; max-width: 280px; max-height: 270px; border-radius: 8px;">
                        </div>
                    </div>
                    <div class="col-md-9 h-100">
                        <div class="card-body p-0 m-0 ms-2">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title d-flex align-items-center mb-0">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </h5>
                                @php
                                    $btnClass = '';

                                    if ($item->status->key == 'REQ') {
                                        $btnClass = 'alert-warning';
                                    } elseif ($item->status->key == 'APP') {
                                        $btnClass = 'alert-warning';
                                    } elseif ($item->status->key == 'RJT') {
                                        $btnClass = 'alert-danger';
                                    } elseif ($item->status->key == 'SUC') {
                                        $btnClass = 'alert-success';
                                    } elseif ($item->status->key == 'CAN') {
                                        $btnClass = 'alert-danger';
                                    }
                                @endphp
                                <div class="alert {{ $btnClass}} py-2 px-1 mb-0">
                                    Status: {{$item->status->status}}
                                </div>
                            </div>
                            <p class="card-text">Nama Hewan: {{ $item->handoverQuestions->where('handover_questions_id', 1)->first()->pivot->answer }}</p>
                            <p class="card-text">Jenis Hewan: {{ $item->handoverQuestions->where('handover_questions_id', 2)->first()->pivot->answer }}</p>
                            
                            <div class="border border-black p-3 me-3 my-3">
                                <p class="mb-2 fw-bold">Catatan Admin: </p>
                                <p class="mb-0">{{ $item->admin_feedback ?? 'Belum ada tanggapan' }}</p>
                            </div>
                            <div class="d-flex justify-content-end gap-2 me-3 mb-3">
                                <a href="{{ route('status-penyerahan.detail', $item->handover_form_id) }}" class="btn btn-primary">Detail Formulir</a>
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