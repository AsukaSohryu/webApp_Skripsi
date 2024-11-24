@extends('internal.layout.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-10 mx-auto">
            <div class="input-group">
                <input type="text" class="form-control rounded-1" id="searchQuestion" placeholder="Cari Pertanyaan" onkeyup="searchQuestions()">
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="questionTable">
        <thead class="thead">
            <tr class="fw-bold text-center border-2 border-bottom border-dark">
                <th scope="col">Pertanyaan</th>
                <th scope="col">Status Pertanyaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptionQuestions as $a)
            <tr class="fw-bold text-center border-2 border-bottom border-dark py-auto mx-5">
                <td class="text-start px-10 py-5">{{ $a->questions }}</td>
                <td class="text-center px-10 py-5">
                    @if($a->is_active == 1)
                        <span class="btn btn-primary" style="min-width: 120px">Aktif</span>
                    @elseif($a->is_active == 0)
                        <span class="btn btn-secondary" style="min-width: 120px">Tidak Aktif</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end py-8">
        <a href="{{ route('pertanyaanPengadopsian.edit') }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Ubah Pertanyaan
        </a>
    </div>
<div>
<script>
function searchQuestions() {
    var input = document.getElementById("searchQuestion");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("questionTable");
    var tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) {
        var tdQuestion = tr[i].getElementsByTagName("td")[0];
        var tdStatus = tr[i].getElementsByTagName("td")[1];
        
        if (tdQuestion && tdStatus) {
            var questionText = tdQuestion.textContent || tdQuestion.innerText;
            var statusText = tdStatus.textContent || tdStatus.innerText;
            
            if (questionText.toLowerCase().indexOf(filter) > -1 || 
                statusText.toLowerCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
@endsection