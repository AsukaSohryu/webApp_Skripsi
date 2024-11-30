@extends('internal.layout.dashboard')

<style>
    .toggle-checkbox {
        opacity: 0; 
        position: absolute;
    }
    .button{
        background-color: #d2d2d2;
        width: 60px;
        height: 30px;
        border-radius: 200px;
        cursor: pointer;
        position: relative;
        transition: 0.2s;
        flex-shrink: 0;
    }
    .button::before{
        position: absolute;
        content: '';
        background-color: #fff;
        width: 20px; 
        height: 20px; 
        border-radius: 100px;
        left: 5px; 
        top: 5px; 
        transition: 0.2s;
    }
    input:checked + .button{
        background-color: #2D68FE;
    }
    input:checked + .button::before{
        transform: translateX(30px);
    }
    input{
        display: none;
    }
</style>

@section('content')
<div class="container">
    <form action="{{ route('pertanyaanPengadopsian.edit.post') }}" method="post" enctype="multipart/form-data">
        @csrf
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
                    <th scope="col" class="text-start ps-3" style="width: 85%">Pertanyaan</th>
                    <th scope="col" class="text-start ps-3" style="width: 15%">Status Pertanyaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adoptionQuestions as $a)
                <tr class="fw-bold text-center border-2 border-bottom border-dark">
                    <td class="text-start px-10 py-5" style="width: 85%">{{ $a->questions }}</td>
                    <td style="width: 15%">
                        <div class="d-flex align-items-center justify-content-start gap-3 py-3">
                            <input type="hidden" name="activeStatus[{{ $a->adoption_question_id }}]" value="off">
                            <input type="checkbox" 
                                class="toggle-checkbox"
                                id="check-{{ $a->adoption_question_id }}" 
                                name="activeStatus[{{ $a->adoption_question_id }}]"
                                data-id="{{ $a->adoption_question_id }}"
                                {{ $a->is_active == 1 ? 'checked' : '' }}>
                            <label for="check-{{ $a->adoption_question_id }}" class="button"></label>
                            <label class="py-3 mb-0" id="isActive-{{ $a->adoption_question_id }}">
                                <b>{{ $a->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</b>
                            </label>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="d-flex justify-content-between mb-4">
            <button type="button" class="btn btn-success" onclick="addNewQuestion()">
                <i class="fas fa-plus me-2"></i>Tambah Pertanyaan
            </button>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-3">
            <a href="{{ route('pertanyaanPengadopsian.index') }}" class="btn btn-secondary">
                Batalkan Perubahan
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i>Simpan Perubahan
            </button>
        </div>
    </form>
<div>

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
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.toggle-checkbox');

    checkboxes.forEach(checkbox => {
        const dataId = checkbox.getAttribute('data-id');
        const statusLabel = document.getElementById(`isActive-${dataId}`); 
        
        checkbox.addEventListener('change', function() {
            // For Debug
            // console.log('Checkbox changed:', {
            //     id: dataId,
            //     newState: this.checked,
            //     timestamp: new Date().toISOString(),
            //     labelExists: !!statusLabel,
            //     labelContent: statusLabel ? statusLabel.innerHTML : null
            // });
            if (statusLabel) {
                statusLabel.innerHTML = this.checked ? '<b>Aktif</b>' : '<b>Tidak Aktif</b>';
            } else {
                console.error('Status label not found for ID:', dataId);
            }
        });
    });
});
</script>

<script>
function addNewQuestion() {
    const tbody = document.querySelector('#questionTable tbody');
    const newRow = document.createElement('tr');
    newRow.className = 'fw-bold text-center border-2 border-bottom border-dark';
    
    const tempId = 'new-' + Date.now();
    
    newRow.innerHTML = `
        <td class="text-start px-10 py-5">
            <input type="text" 
                   name="new_questions[]" 
                   class="form-control" 
                   placeholder="Masukkan pertanyaan baru">
        </td>
        <td>
            <div class="col d-flex align-items-center justify-content-start gap-3 py-3">
                <input type="checkbox" 
                       class="toggle-checkbox"
                       id="check-${tempId}"
                       name="new_activeStatus[]"
                       data-id="${tempId}">
                <label for="check-${tempId}" class="button"></label>
                <label id="isActive-${tempId}">
                    <b>Tidak Aktif</b>
                </label>
                <button type="button" 
                        class="btn btn-danger btn-sm" 
                        onclick="this.closest('tr').remove()">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </td>
    `;
    
    tbody.appendChild(newRow);

    const newCheckbox = newRow.querySelector('.toggle-checkbox');
    const statusLabel = document.getElementById(`isActive-${tempId}`);
    
    newCheckbox.addEventListener('change', function() {
        statusLabel.innerHTML = this.checked ? '<b>Aktif</b>' : '<b>Tidak Aktif</b>';
    });
}
</script>
@endsection