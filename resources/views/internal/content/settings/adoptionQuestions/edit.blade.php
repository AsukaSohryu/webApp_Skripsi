@extends('internal.layout.dashboard')

<style>
    /* Styling for the toggle switch (for active/inactive status) */
    .toggle-checkbox-status {
        opacity: 0;
        position: absolute;
    }

    .button {
        background-color: #d2d2d2;
        width: 60px;
        height: 30px;
        border-radius: 200px;
        cursor: pointer;
        position: relative;
        transition: 0.2s;
        flex-shrink: 0;
    }

    .button::before {
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

    input:checked + .button {
        background-color: #2D68FE;
    }

    input:checked + .button::before {
        transform: translateX(30px);
    }

    input[type="checkbox"].toggle-checkbox-status {
        display: none;
    }

    /* For the deletion checkboxes, no toggle button styling */
    .delete-checkbox {
        margin: 0;
        padding: 0;
        display: inline-block;
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
</style>

@section('content')
<div class="container">
    <form action="{{ route('pertanyaanPengadopsian.edit.post') }}" method="post" enctype="multipart/form-data">
        @csrf
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
                    <th scope="col" class="text-center ps-3" style="width: 5%">
                        <input type="checkbox" id="selectAllCheckbox" onclick="toggleSelectAll()">
                    </th>
                    <th scope="col" class="text-start ps-3" style="width: 80%">Pertanyaan</th>
                    <th scope="col" class="text-start ps-3" style="width: 15%">Status Pertanyaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adoptionQuestions as $a)
                <tr class="fw-bold text-center border-2 border-bottom border-dark">
                    <td class="text-center py-5 ps-3" style="width: 5%;">
                        <input type="checkbox" class="deleteCheckbox" name="deleteQuestions[]" value="{{ $a->adoption_question_id }}" 
                            data-used="{{ $a->used_in_form }}" 
                            onclick="toggleDeleteButton()">
                    </td>
                    <td class="text-start px-3 py-5" style="width: 80%">{{ $a->questions }}</td>
                    <td style="width: 15%">
                        <div class="d-flex align-items-center justify-content-start gap-3 py-3">
                            <input type="hidden" name="activeStatus[{{ $a->adoption_question_id }}]" value="off">
                            <input type="checkbox" 
                                class="toggle-checkbox-status"
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
            <button type="button" class="btn btn-success" onclick="addNewQuestion()" id="addQuestionButton">
                <i class="fas fa-plus me-2"></i>Tambah Pertanyaan
            </button>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-3">
            <a href="{{ route('pertanyaanPengadopsian.index') }}" class="btn btn-secondary">
                Batalkan Perubahan
            </a>
            <button type="submit" id="saveButton" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i>Simpan Perubahan
            </button>
            <button type="submit" id="deleteButton" class="btn btn-danger" style="display: none;">
                <i class="fas fa-trash me-2"></i>Hapus Pertanyaan
            </button>
        </div>
    </form>

    @if(session('swal_type'))
        <script>
            Swal.fire({
                icon: '{{ session('swal_type') }}',
                title: '{{ session('swal_message') }}',
                showConfirmButton: true,
            });
        </script>
    @endif
</div>

<script>

    //check pertanyaan dipake ga di form
    $(document).ready(function () {
        $('.deleteCheckbox').each(function () {
            var isUsedInForm = $(this).data('used');  //check variable
            if (isUsedInForm) {
                $(this).prop('disabled', true);  // disable kalo true
                $(this).parent().parent().css('background-color', '#f5f5f5');  //else disable
            }
        });

        // Handle change event for checkboxes
        $('.deleteCheckbox').change(function() {
            toggleDeleteButton();  // Enable or disable the delete button based on checkbox state
        });
    });

    // Search functionality for questions
    function searchQuestions() {
        var input = document.getElementById("searchQuestion");
        var filter = input.value.toLowerCase();
        var table = document.getElementById("questionTable");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
            var tdQuestion = tr[i].getElementsByTagName("td")[1];
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

    // Toggle "Simpan Perubahan" and "Hapus Pertanyaan" buttons based on checked checkboxes
    function toggleDeleteButton() {
        var checkboxes = document.querySelectorAll('.deleteCheckbox');
        var saveButton = document.getElementById('saveButton');
        var deleteButton = document.getElementById('deleteButton');
        var addQuestionButton = document.getElementById('addQuestionButton');
        
        // Check if any checkbox is checked
        var anyChecked = Array.from(checkboxes).some(function (checkbox) {
            return checkbox.checked;
        });

        // Show "Hapus Pertanyaan" button and disable "Tambah Pertanyaan" if any checkbox is checked
        deleteButton.style.display = anyChecked ? 'inline-block' : 'none';
        addQuestionButton.disabled = anyChecked;

        // If no checkbox is checked, show the "Simpan Perubahan" button
        saveButton.disabled = anyChecked;
    }

    // Select or deselect all checkboxes
    function toggleSelectAll() {
        var selectAllCheckbox = document.getElementById('selectAllCheckbox');
        var checkboxes = document.querySelectorAll('.deleteCheckbox');

        // Loop through all checkboxes
        checkboxes.forEach(function (checkbox) {
            // Only change the checked state if the checkbox is not disabled
            if (!checkbox.disabled) {
                checkbox.checked = selectAllCheckbox.checked;
            }
        });

        toggleDeleteButton(); // Re-enable/disable buttons based on checked state
    }


    // Remove the row when delete button is clicked
    function deleteRow(button) {
        button.closest('tr').remove();
        toggleDeleteButton(); // Re-enable/disable buttons
    }

    // Add new question dynamically
    function addNewQuestion() {
        const tbody = document.querySelector('#questionTable tbody');
        const index = tbody.rows.length;
        
        const newRow = document.createElement('tr');
        newRow.className = 'fw-bold text-center border-2 border-bottom border-dark';
        
        newRow.innerHTML = `
            <td class="text-center py-5 ps-3">
                <input type="checkbox" class="deleteCheckbox" name="deleteQuestions[]" value="new-${index}" onclick="toggleDeleteButton()" hidden>
            </td>
            <td class="text-start px-3 py-5">
                <input type="text" name="new_questions[${index}]" class="form-control" placeholder="Masukkan pertanyaan baru">
            </td>
            <td>
                <div class="col d-flex align-items-center justify-content-start gap-3 py-3">
                    <input type="checkbox" class="toggle-checkbox" id="check-new-${index}" name="new_activeStatus[${index}]" value="1" hidden>
                    <label for="check-new-${index}" class="button"></label>
                    <label id="isActive-new-${index}">
                        <b>Tidak Aktif</b>
                    </label>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        `;
        tbody.appendChild(newRow);

        // Add event listener to dynamically created checkbox
        const newCheckbox = newRow.querySelector('.toggle-checkbox');
        const statusLabel = document.getElementById(`isActive-new-${index}`);
        
        newCheckbox.addEventListener('change', function() {
            statusLabel.innerHTML = this.checked ? '<b>Aktif</b>' : '<b>Tidak Aktif</b>';
        });
    }
</script>
@endsection
