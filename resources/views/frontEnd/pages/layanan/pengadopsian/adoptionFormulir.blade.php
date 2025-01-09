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

<section id="section-1-layanan-adopsi">
    <div class="container">
        <div class="row my-2">
            <h1 class="text-center">Formulir Pengajuan Pengadopsian Hewan</h1>
            <hr />
            <div class="col">
                <div class="mt-3">
                    {!! $shelterInformation->adoption_information !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container border border-black my-2" style="border-radius: 16px">
        <form action="{{ route('layanan-adopsi.create.post', $animal->animal_id) }}" method="post" class="m-4" enctype="multipart/form-data" id="formAdopsi">  
            @csrf
            {{-- Profile User --}}
            <div class="row my-1">
                <div class="col">
                    <label for="" class="my-2">Nama Pengaju</label>
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
                    <label for="" class="my-2">Alamat</label>
                    <input type="text" name="alamatPemilik" id="alamatPemilik" class="form-control" value="{{$user->address}}" disabled>
                </div>
            </div>
            <hr>
            
            <!-- Displaying the handover questions -->
            <div class="row my-1">  
                <div class="col">
                    @foreach($adoptionQuestions as $question)
                    <div class="col">
                        <label class="my-2">{{ $question->questions }}</label>
                        <textarea class="form-control" name="answers[{{ $question->adoption_question_id }}]" rows="3" placeholder="Masukan Jawaban Anda" required></textarea>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row my-3">
                <div class="gap-3 my-10 d-flex justify-content-end">
                    <a href="{{ route('layanan-lihat') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                    <button class="btn btn-primary" type="submit" style="border: 0;" id="submitForm">Kirim Pengajuan</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
<script>
    document.getElementById('submitForm').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission by default

        // Show SweetAlert2 confirmation popup
        Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Jawaban Anda Tidak Dapat Diubah Kembali",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Saya Yakin',
                cancelButtonText: 'Tidak, Kembali',
            }).then((result) => {
                if (result.isConfirmed) {
                    // If "Yes, submit it!" is clicked, submit the form
                    document.getElementById('formAdopsi').submit();
                }
            });
    });
</script>

<script>
    $(document).ready(function() {
        // Function to check if any textarea is empty
        function checkEmptyFields() {
            let isEmpty = false;
            $('textarea').each(function() {
                if ($(this).val().trim() === '') {
                    isEmpty = true;  // If any textarea is empty, disable the submit button
                }
            });

            // If there's an empty field, disable the submit button
            if (isEmpty) {
                $('#submitForm').attr('disabled', true);
            } else {
                $('#submitForm').attr('disabled', false); // Enable submit button if all fields are filled
            }
        }

        // Check empty fields on keyup in any textarea
        $('textarea').on('keyup', function() {
            checkEmptyFields();
        });

        // Run the check initially in case fields are already filled
        checkEmptyFields();
    });
</script>
@endsection