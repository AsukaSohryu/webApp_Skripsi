@extends('frontend.layout.layout')

@section('link')

@endsection

@section('content')


<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="hero" style="height: 76vh; background-image: url('{{ asset('assets/images/layananKami/adoption_dog.jpg') }}'); background-position: center;">
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Lihat Hewan yang Siap Diadopsi</p>
    </div>
</section>

@if($shelterInformation->is_accepting_adoption == 0)
<section id="section-1-layanan-pengadopsian">
    <div class="container">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Lihat Hewan yang Siap Diadopsi</h1>
            <hr />
            <div class="alert alert-info text-center">
                Shelter Sedang Tidak Melayani Pengajuan Pengadopsian Hewan
            </div>
        </div>
    </div>
</section>
@else
<section id="section-1-layanan-pengadopsian">
    <div class="container">
        <div class="row my-2 d-flex" style="gap: 8px;">
            <h1 class="text-center">Lihat Hewan yang Siap Diadopsi</h1>
            <hr />
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($animals as $animal)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('uploadedImages/dataHewan/' . $animal->photo) }}" class="card-img-top" alt="{{ $animal->animal_name }}" style="object-fit: cover; width: 100%; height: 200px;">
                        <div class="card-body m-0 p-0">
                            <div class="justify-content-center bg-light p-3">
                                <h6 class="card-text small">Nama Hewan: {{ $animal->animal_name }}</h6>
                                <h6 class="card-text small">Usia Hewan:
                                    @php
                                        $birthDate = new DateTime($animal->birth_date);
                                        $today = new DateTime();
                                        
                                        $ageInMonths = ($today->format('Y') - $birthDate->format('Y')) * 12;
                                        $ageInMonths += $today->format('n') - $birthDate->format('n');
                                        
                                        if ($today->format('j') < $birthDate->format('j')) {
                                            $ageInMonths--;
                                        }
                                        
                                        $years = floor($ageInMonths / 12);
                                        $months = $ageInMonths % 12;
                                        
                                        if ($ageInMonths < 0) {
                                            $years = 0;
                                            $months = 0;
                                        }
                                        
                                        $ageString = '';
                                        if ($years > 0) {
                                            $ageString .= $years . ' Tahun ';
                                        }
                                        if ($months > 0 || $years === 0) {
                                            $ageString .= $months . ' Bulan';
                                        }
                                        if ($years === 0 && $months === 0) {
                                            $ageString = '0 Bulan';
                                        }
                                        echo $ageString;
                                    @endphp
                                </h6>
                                <h6 class="card-text small">Deskripsi Hewan: 
                                    @php
                                        $words = explode(' ', $animal->description); // Split the description into words
                                        $limitedDescription = implode(' ', array_slice($words, 0, 10)); // Limit to 15 words
                                    @endphp
                                    {{ $limitedDescription }}{{ count($words) > 15 ? '...' : '' }}
                                </h6>
                                <h6 class="card-text small">Status Hewan: {{ $animal->status_name }}</h6>
                            </div>
                            <a href="{{ route('layanan-adopsi.detail', $animal->animal_id ) }}" class="btn d-flex justify-content-center btn-secondary btn-block rounded-0">Detail Hewan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {!! $animals->links() !!} <!-- Pagination links from Laravel -->
        </div>
    </div>
</section>
@endif

@if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil',
            text: '{{ session('success') }}', // Display the success message
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    </script>
@elseif(session('error'))
    <script>
        Swal.fire({
            title: 'Gagal',
            text: '{{ session('error') }}', // Display the error message
            icon: 'error',
            confirmButtonText: 'Oke'
        });
    </script>
@endif
@endsection

@section('js')

@endsection