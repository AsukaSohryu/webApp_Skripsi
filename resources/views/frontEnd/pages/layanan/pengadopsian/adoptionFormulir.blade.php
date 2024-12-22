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
        <p class="type-2">Layanan Kami</p>
        <p class="type-2">Pengajuan Pengadopsian Hewan</p>
    </div>
    
</section>

<section id="section-1-layanan-adopsi">
    <div class="container">
        <div class="row my-2">
            <div class="col">
                <label for="">Formulir Pengajuan Penyerahan Hewan</label>
                <p class="form-control" style="border: none; background: none; margin-top: 10px;">{{$shelterInformation->adoption_information}}</p>
            </div>
        </div>
    </div>
    <div class="container border border-black my-2" style="border-radius: 16px">
        <form action="{{ route('layanan-adopsi.create.post', $animal->animal_id) }}" method="post" class="m-4" enctype="multipart/form-data">  
            @csrf
            {{-- Profile User --}}
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Nama Pemilik</label>
                    <input type="text" name="namaPemilik" id="namaPemilik" class="form-control" value="{{$user->name}}" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Nomor Telepon</label>
                    <input type="text" name="noTelp" id="noTelp" class="form-control" value="{{$user->phone_number}}" disabled>
                </div>
                <div class="col">
                    <label for="" class="my-2">Nomor Whatsapp</label>
                    <input type="text" name="noWhatsapp" id="noWhatsapp" class="form-control" value="{{$user->whatsapp_number}}" disabled>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Alamat Pemilik</label>
                    <input type="text" name="alamatPemilik" id="alamatPemilik" class="form-control" value="{{$user->address}}" disabled>
                </div>
            </div>
            <hr>
            
            <!-- Displaying the handover questions -->
            <div class="row my-2">  
                <div class="col">
                    @foreach($adoptionQuestions as $question)
                    <div class="col">
                        <label>{{ $question->questions }}</label>
                        <textarea class="form-control my-2" name="answers[{{ $question->adoption_question_id }}]" rows="3" placeholder="Masukan Jawaban Anda" required></textarea>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="gap-3 my-10 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit" style="border: 0;">Kirim Pengajuan</button>
            </div>
        </form>
    </div>
</section>

@endsection


@section('js')

@endsection