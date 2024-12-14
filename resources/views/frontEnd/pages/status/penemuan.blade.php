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
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Tanggal</h5>
                        <p class="card-text">Alamat</p>
                        <br />
                        <p class="card-text">Jenis Hewan</p>
                        <p class="card-text">Deskripsi Hewan</p>
                        <br />
                        <div class="border border-black">
                            <p>Respon Admin: </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection