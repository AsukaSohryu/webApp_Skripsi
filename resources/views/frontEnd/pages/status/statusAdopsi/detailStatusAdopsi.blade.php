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
    <div class="container">
        <h4 class="text-center">Status Laporan Pengajuan Pengadopsian Hewan</h4>
        <hr class="my-0">
    </div>
    <div class="container justify-content-center">
        <div class="row my-3">
            <div class="row my-3">
                <div class="col">
                    <label for="">Nama Pengguna</label>
                    <input type="text" name="userName" id="userName" value="{{$adoptions->users->name}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">No Telepon</label>
                    <input type="text" name="phoneNumber" id="phoneNumber" value="{{$adoptions->users->phone_number}}" class="form-control" disabled>
                </div>
                <div class="col">
                    <label for="">No Whatsapp</label>
                    <input type="text" name="whatsappNumber" id="whatsappNumber" value="{{$adoptions->users->whatsapp_number}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Alamat Pengguna</label>
                    <input type="text" name="address" id="address" value="{{$adoptions->users->address}}" class="form-control" disabled>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="">Pekerjaan Pengguna</label>
                    <input type="text" name="job" id="job" value="{{$adoptions->users->job}}" class="form-control" disabled>
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="row">
            @foreach ($adoptions->adoptionQuestions as $question)
                <div class="row my-3">
                    <div class="col">
                        <!-- Label for the question -->
                        <label for="question-{{ $question->id }}" class="form-label">
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
        <hr class="my-0">
        <div class="row">
            {{-- Updateable Field --}}
            <div class="row my-3">
                <div class="col">
                    <label for="">Status Laporan</label>
                    <textarea type="text" name="statusAdopsi" id="statusAdopsi" class="form-control" disabled>{{$adoptions->status->status}}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="adminFeedback">Respon Admin</label>
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