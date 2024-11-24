@extends('internal.layout.dashboard')

{{-- <style>
    .button{
        background-color: #d2d2d2;
        width: 60px;
        height: 30px;
        border-radius: 200px;
        cursor: pointer;
        position: relative;
        transition: 0.2s;
    }
    .button::before{
        position: absolute;
        content: '';
        background-color: #fff;
        width: 20px;
        height: 20px;
        border-radius: 200px;
        margin: 5px;
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
    .custom-dropdown {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg"><polyline points="30,50 70,90 110,50" stroke="black" stroke-width="10" fill="none"/></svg>') no-repeat right center;
        background-size: 20px; /* Add padding to make room for the arrow */
        background-position: calc(100% - 10px) center; /* Adjust the position here */
        padding-right: 40px;
        width: calc(100% - 0px);
        box-sizing: border-box;
    }
</style> --}}

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
            <tr class="fw-bold text-center border-2 border-bottom border-dark mx-5">
                <div class="d-flex align-items-center justify-content-start m-4">
                    <th scope="col" class="text-start ps-3">Pertanyaan</th>
                    <th scope="col" class="text-start ps-3">Status Pertanyaan</th>
                </div>
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptionQuestions as $a)
            <tr class="fw-bold text-center border-2 border-bottom border-dark">
                <td class="text-start px-10 py-5">{{ $a->questions }}</td>
                <td>
                    <div class="col d-flex align-items-center justify-content-start m-4">
                        <input type="hidden" name="activeStatus" value="0">
                        <input type="checkbox" 
                               class="toggle-checkbox" 
                               id="check-{{ $a->adoption_question_id }}" 
                               name="activeStatus[{{ $a->adoption_question_id }}]"
                               data-id="{{ $a->adoption_question_id }}"
                               {{ $a->is_active == 1 ? 'checked' : '' }}
                        >
                        <label for="check" class="button"></label>
                        <label class="ps-3" id="isActive-{{ $a->adoption_question_id }}">
                            <b>{{ $a->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</b>
                        </label>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end py-8">
        <div class="d-flex justify-content-between mb-4">
            <button type="button" class="btn btn-success" onclick="addNewQuestion()">
                <i class="fas fa-plus me-2"></i>Tambah Pertanyaan
            </button>
        </div>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.toggle-checkbox');
    
    // console.log('Found checkboxes:', checkboxes.length);
    // checkboxes.forEach((checkbox, index) => {
    //     console.log(`Checkbox ${index + 1}:`, {
    //         element: checkbox,
    //         id: checkbox.id,
    //         dataId: checkbox.getAttribute('data-id'),
    //         name: checkbox.name,
    //         checked: checkbox.checked,
    //         attributes: Array.from(checkbox.attributes).map(attr => ({
    //             name: attr.name,
    //             value: attr.value
    //         })),
    //         html: checkbox.outerHTML
    //     });
    // });

    checkboxes.forEach(checkbox => {
        const dataId = checkbox.getAttribute('data-id');
        
        if (!dataId) {
            console.error('Missing data-id for checkbox:', checkbox);
            return;
        }

        const statusLabel = document.getElementById(`isActive-${dataId}`); 
        
        checkbox.addEventListener('change', function() {
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
    
    // Create unique temporary ID
    const tempId = 'new-' + Date.now();
    
    newRow.innerHTML = `
        <td class="text-start px-10 py-5">
            <input type="text" 
                    name="new_questions[]" 
                    class="form-control" 
                    placeholder="Masukkan pertanyaan baru">
        </td>
        <td>
            <div class="col d-flex align-items-center justify-content-center m-4 gap-3">
                <input type="checkbox" 
                        class="toggle-checkbox" 
                        id="check-${tempId}"
                        name="new_activeStatus[]"
                        data-id="${tempId}">
                <label class="ps-3" id="isActive-${tempId}">
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

    // Add event listener for new checkbox
    const newCheckbox = newRow.querySelector('.toggle-checkbox');
    const newLabel = newRow.querySelector(`#isActive-${tempId}`);
    
    newCheckbox.addEventListener('change', function() {
        newLabel.innerHTML = this.checked ? '<b>Aktif</b>' : '<b>Tidak Aktif</b>';
    });
}
</script>
@endsection