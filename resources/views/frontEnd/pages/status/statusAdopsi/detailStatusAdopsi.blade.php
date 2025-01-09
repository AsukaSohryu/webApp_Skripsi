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
        <p class="type-2">Status Laporan Pengajuan Pengadopsian Hewan</p>
    </div>
</section>

<section id="section-1-status-penemuan">
    <div class="container my-3">
        <h4 class="text-center">Status Laporan Pengajuan Pengadopsian Hewan</h4>
        <hr>
    </div>
    <div class="container justify-content-center border border-black my-2 " style="border-radius: 16px; gap: 0;">
        <div class="row mx-4 mt-4">
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Nama Pengaju</label>
                    <input type="text" name="userName" id="userName" value="{{$adoptions->users->name}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">No Telepon</label>
                    <input type="text" name="phoneNumber" id="phoneNumber" value="{{$adoptions->users->phone_number}}" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-2">No Whatsapp</label>
                    <input type="text" name="whatsappNumber" id="whatsappNumber" value="{{$adoptions->users->whatsapp_number}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Alamat</label>
                    <input type="text" name="address" id="address" value="{{$adoptions->users->address}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Pekerjaan</label>
                    <input type="text" name="job" id="job" value="{{$adoptions->users->job}}" class="form-control" disabled>
                </div>
            </div>
            {{-- Area Detail Hewan --}}
            <div class="row mx-4">
                <div class="d-flex justify-content-center justify-content-md-center align-items-center h-100 m-0 p-0">
                    <img src="{{ asset('storage/animal/' . $adoptions->animal->photo) }}" 
                        class="img-fluid rounded-start w-100 m-0" 
                        alt="Foto Hewan"
                        style="object-fit: cover; max-width: 300px;">
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Nama Hewan</label>
                    <input type="text" name="animalName" id="animalName" value="{{$adoptions->animal->animal_name}}" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-2">Umur</label>
                    <input type="text" name="animalAge" id="animalAge" value="" class="form-control" disabled>
                </div>
            </div>
        </div>
        <hr style="margin-left: 2.3rem; margin-right: 3.7rem;">
        <div class="row mx-4">
            @foreach ($adoptions->adoptionQuestions as $question)
                <div class="row my-1">
                    <div class="col">
                        <!-- Label for the question -->
                        <label for="question-{{ $question->id }}" class="form-label my-2">
                            {{ $question->questions }}
                        </label>

                        <!-- Input for the answer -->
                        <textarea 
                            id="question-{{ $question->id }}" 
                            name="answers[{{ $question->id }}]" 
                            class="form-control" 
                            placeholder="Enter your answer" 
                            disabled>{{ $question->pivot->answer ?? '' }}
                        </textarea>
                    </div>
                </div>
            @endforeach
        </div>
        <hr style="margin-left: 2.3rem; margin-right: 3.7rem;">
        <div class="row mx-4">
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Tanggal Formulir Dibuat</label>
                    <input type="text" name="tanggalFormulirDibuat" id="tanggalFormulirDibuat" value="{{$adoptions->created_at}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Tanggal Formulir Terakhir Diperbaharui</label>
                    <input type="text" name="tanggalFormulirDiperbaharui" id="tanggalFormulirDiperbaharui" value="{{$adoptions->updated_at}}" class="form-control" disabled>
                </div>
            </div>
        </div>
        <div class="row mx-4 mb-4">
            {{-- Updateable Field --}}
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Status Formulir</label>
                    <input type="text" name="statusAdopsi" id="statusAdopsi" value="{{$adoptions->status->status}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="adminFeedback" class="my-2">Respon Admin</label>
                    <textarea 
                        name="adminFeedback" 
                        id="adminFeedback" 
                        class="form-control" 
                        disabled>{{ $adoptions->admin_feedback }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <a href="{{ route('status-adopsi') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // console.log('DOM Content Loaded');
    const DOB = "{{ $adoptions->animal->birth_date }}";
    const usiaHewanInput = document.getElementById('animalAge');


    function calculateAge() {
        const birthDate = new Date(DOB);
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
    if (DOB) {
        calculateAge();
    }
    
});
</script>
@endsection