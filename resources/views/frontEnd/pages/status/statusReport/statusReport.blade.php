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

<section id="hero" style="height: 72vh; background-image: url('{{ asset('assets/images/layananKami/Stray_pets_1.jpg') }}'); background-position: center;">
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Status</p>
        <p class="type-2">Status Laporan Penemuan Hewan Peliharaan Liar</p>
    </div>
</section>

<section id="section-1-status-penemuan">
    <div class="container">
        <h4 class="text-center">Status Laporan Penemuan Hewan Peliharaan Liar</h4>
        <hr>
    </div>
    <div class="container">
        @foreach($reports as $item)
            <div class="card mb-3">
                <div class="row align-items-center justify-content-between">
                    <div class="col align-items-left">
                        <div class="d-flex justify-content-center justify-content-md-center align-items-center h-100 m-4">
                            <img src="@if($item->admin_feedback_photo) 
                                        {{ asset('storage/formReport/' . $item->admin_feedback_photo) }}
                                    @else
                                        {{ asset('storage/formReport/' . $item->animal_photo) }}
                                    @endif"
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
                                @php
                                    $btnClass = '';

                                    if ($item->status->key == 'REQ') {
                                        $btnClass = 'alert-warning';
                                    } elseif ($item->status->key == 'ONP') {
                                        $btnClass = 'alert-warning';
                                    } elseif ($item->status->key == 'RSC') {
                                        $btnClass = 'alert-success';
                                    } elseif ($item->status->key == 'NFD') {
                                        $btnClass = 'alert-danger';
                                    } elseif ($item->status->key == 'OTH') {
                                        $btnClass = 'alert-danger';
                                    }
                                @endphp
                                <div class="alert {{$btnClass}} py-2 px-1 mb-0">
                                    Status: {{$item->status->status}}
                                </div>
                            </div>
                            <p class="card-text">Jenis Hewan: {{ $item->animal_type }}</p>
                            <p class="card-text">Lokasi: {{ $item->location }}</p>
                            <p class="card-text">Deskripsi: {{ $item->description }}</p>
                            
                            <div class="border border-black p-3 me-3 my-3">
                                <p class="mb-2 fw-bold">Respon Admin: </p>
                                <p class="mb-0">{{ $item->admin_feedback ?? 'Belum ada tanggapan' }}</p>
                            </div>
                            <div class="d-flex justify-content-end gap-2 me-3 mb-3">
                                <a href="{{ route('status-laporan.detail', $item->report_form_id) }}" class="btn btn-primary">Detail Formulir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if($reports->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada laporan penemuan hewan peliharaan liar yang dibuat
            </div>
        @endif
    </div>
</section>
@endsection