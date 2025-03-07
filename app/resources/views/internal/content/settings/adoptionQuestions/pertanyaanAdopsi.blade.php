@extends('internal.layout.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-10">
            <div class="input-group">
                <input type="text" class="form-control rounded-1" id="searchQuestion" placeholder="Pencarian" onkeyup="searchQuestions()">
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="questionTable">
        <thead class="thead">
            <tr class="fw-bold text-center border-2 border-bottom border-dark">
                <th scope="col" class="text-start ps-3" style="width: 85%">Pertanyaan</th>
                <th scope="col" class="text-start ps-3" style="width: 15%">Status Pertanyaan</th>
                {{-- <th scope="col" class="text-start ps-3" style="width: 15%"></th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptionQuestions as $a)
            <tr class="fw-bold text-center border-2 border-bottom border-dark">
                <td class="text-start px-10 py-5" style="width: 85%">{{ $a->questions }}</td>
                <td class="text-center px-10 py-5" style="width: 15%">
                    @if($a->is_active == 1)
                        <span class="btn btn-primary" style="min-width: 120px">Aktif</span>
                    @elseif($a->is_active == 0)
                        <span class="btn btn-secondary" style="min-width: 120px">Tidak Aktif</span>
                    @endif
                </td>
                {{-- <td class="text-center py-5" style="width: 15%">
                    <form action="{{ route('pertanyaanPengadopsian.delete', $a->adoption_question_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Question</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end py-8 px-10">
        <a href="{{ route('pertanyaanPengadopsian.edit') }}" class="btn btn-primary" id="editQuestion">
            Ubah Pertanyaan
        </a>
    </div>
<div>

@if(session('swal_type'))
    <script>
        Swal.fire({
            icon: '{{ session('swal_type') }}',
            title: '{{ session('swal_message') }}',
            showConfirmButton: true,
        });
    </script>
@endif
<script>
function searchQuestions() {
    var input = document.getElementById("searchQuestion");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("questionTable");
    var tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) {
        var tdQuestion = tr[i].getElementsByTagName("td")[0];
        
        if (tdQuestion) {
            var questionText = tdQuestion.textContent || tdQuestion.innerText;
            if (questionText.toLowerCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

<script>
    @if(session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    @elseif(session('error'))
        Swal.fire({
            title: 'Gagal!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'Oke'
        });
    @endif
</script>

<script>
    document.getElementById('editQuestion').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission by default

        // Show SweetAlert2 confirmation popup
        Swal.fire({
            title: 'Apakah Anda Ingin Mengubah Daftar Pertanyaan Ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, Lanjutkan',
            cancelButtonText: 'Tidak, Kembali',
        }).then((result) => {
            if (result.isConfirmed) {
                // If "Yes, submit it!" is clicked, submit the form
                window.location.href = '{{ route('pertanyaanPengadopsian.edit') }}';
            }
        });
    });
</script>
@endsection