@extends('frontend.layout.layout')

@section('link')

@endsection

@section('content')
<section id="nav-rep" class="p-0 mb-2 pb-1">
    <br /> 
    <br />
    <br />
</section>

<section id="hero" style='height: 72vh; background-image: url("./assets/images/tentangKami/owl.jpg"); background-position: center;'>
</section>

<section id="breadcrumbs" class="section-bg-5">
    <div class="container">
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Pengajuan Pengadopsian Hewan</p>
    </div>
</section>
<section id="section-1-layanan-pengadopsian">
    <div class="container">
        <div class="row">
            @foreach($animals as $animal)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/animal/' . $animal->photo) }}" class="card-img-top" alt="{{ $animal->animal_name }}">
                        <div class="card-body m-0 p-0">
                            <div class="justify-content-center bg-light p-3">
                                <h6 class="card-title">Nama Hewan: {{ $animal->animal_name }}</h6>
                                <h6 class="card-title">Usia Hewan:
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
                                <h6 class="card-text small">Deskripsi Hewan: {{ $animal->description }}</h6>
                            </div>
                            <a href="{{ route('layanan-adopsi.detail', $animal->animal_id ) }}" class="btn d-flex justify-content-center btn-secondary btn-block rounded-0">Adopsi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $animals->links() }} <!-- Pagination links -->
        </div>
    </div>
</section>

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