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
    <form action="{{ route('pertanyaanPenyerahan.edit.post') }}" method="post" enctype="multipart/form-data" id="questionForm">
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
                    </th>
                    <th scope="col" class="text-start ps-3" style="width: 80%">Pertanyaan</th>
                    <th scope="col" class="text-start ps-3" style="width: 15%">Status Pertanyaan</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($handoverQuestions as $h)
                <tr class="fw-bold text-center border-2 border-bottom border-dark">
                    <td class="text-start px-10 py-5" style="width: 85%">{{ $h->questions }}</td>
                    <td style="width: 15%">
                        @if($h->handover_questions_id >= 1 && $h->handover_questions_id <= 10)
                            <div class="d-flex align-items-center justify-content-start gap-3 py-3" 
                                style="opacity: 0.6; pointer-events: none;">
                        @else
                            <div class="d-flex align-items-center justify-content-start gap-3 py-3">
                        @endif
                            <input type="hidden" name="activeStatus[{{ $h->handover_questions_id }}]" value="off">
                            <input type="checkbox" 
                                class="toggle-checkbox"
                                id="check-{{ $h->handover_questions_id }}" 
                                name="activeStatus[{{ $h->handover_questions_id }}]"
                                data-id="{{ $h->handover_questions_id }}"
                                {{ $h->is_active == 1 ? 'checked' : '' }}
                                >
                            <label for="check-{{ $h->handover_questions_id }}" class="button"></label>
                            <label class="py-3 mb-0" id="isActive-{{ $h->handover_questions_id }}">
                                <b>{{ $h->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</b>
                            </label>
                        </div>
                    </td>
                </tr>
                @endforeach --}}
                @foreach ($handoverQuestions as $h)
                <tr class="fw-bold text-center border-2 border-bottom border-dark">
                    <td class="text-center py-5 ps-3" style="width: 5%;">
                        @if($h->handover_questions_id >= 1 && $h->handover_questions_id <= 9)
                            <input type="checkbox" class="deleteCheckbox" name="deleteQuestions[]" value="{{ $h->handover_questions_id }}" 
                                data-used="{{ $h->used_in_form }}" 
                                onclick="toggleDeleteButton()" disabled>
                        @else
                        <input type="checkbox" class="deleteCheckbox" name="deleteQuestions[]" value="{{ $h->handover_questions_id }}" 
                            data-used="{{ $h->used_in_form }}" 
                            onclick="toggleDeleteButton()">
                        @endif
                    </td>
                    <td class="text-start px-3 py-5" style="width: 80%">{{ $h->questions }}</td>
                    <td style="width: 15%">
                        <div class="d-flex align-items-center justify-content-start gap-3 py-3">
                            <input type="hidden" name="activeStatus[{{ $h->handover_questions_id }}]" value="off">

                            <!-- Checkbox with conditionally disabled behavior -->
                            <input type="checkbox" 
                                class="toggle-checkbox-status"
                                id="check-{{ $h->handover_questions_id }}" 
                                name="activeStatus[{{ $h->handover_questions_id }}]"
                                data-id="{{ $h->handover_questions_id }}"
                                {{ $h->is_active == 1 ? 'checked' : '' }}>

                                {{-- {{ ($h->handover_questions_id >= 1 && $h->handover_questions_id <= 9) ? 'disabled' : '' }} --}}
                            <label for="check-{{ $h->handover_questions_id }}" class="button"></label>
                            <label class="py-3 mb-0" id="isActive-{{ $h->handover_questions_id }}">
                                <b>{{ $h->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}</b>
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
        {{-- <div class="d-flex justify-content-between mb-4">
            <p style="color: red;">*Centang pertanyaan yang ingin dihapus lalu simpan perubahan (Pertanyaan yang telah digunakan pada formulir tidak dapat dihapus)</p>
        </div> --}}
        <div class="d-flex justify-content-between gap-2 mt-3">
            <p style="color: red;">*Centang pertanyaan yang ingin dihapus lalu simpan perubahan<br>(Pertanyaan yang telah digunakan pada formulir tidak dapat dihapus)</p>
            <div class="d-flex gap-2">
                <a href="{{ route('pertanyaanPenyerahan.index') }}" class="btn btn-secondary d-flex align-items-center">
                    Batalkan
                </a>
                <button type="submit" class="btn btn-primary" id="saveButton">
                    Simpan Perubahan
                </button>
            </div>
            {{-- <button type="submit" id="deleteButton" class="btn btn-danger" style="display: none;" id="deleteButton">
                <i class="fas fa-trash me-2"></i>Hapus Pertanyaan
            </button> --}}
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
<div>

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

    // function toggleDeleteButton() {
    //     var checkboxes = document.querySelectorAll('.deleteCheckbox');
    //     var saveButton = document.getElementById('saveButton');
    //     var deleteButton = document.getElementById('deleteButton');
    //     var addQuestionButton = document.getElementById('addQuestionButton');
        
    //     // Check if any checkbox is checked
    //     var anyChecked = Array.from(checkboxes).some(function (checkbox) {
    //         return checkbox.checked;
    //     });

    //     // Show "Hapus Pertanyaan" button and disable "Tambah Pertanyaan" if any checkbox is checked
    //     deleteButton.style.display = anyChecked ? 'inline-block' : 'none';
    //     addQuestionButton.disabled = anyChecked;

    //     // If no checkbox is checked, show the "Simpan Perubahan" button
    //     saveButton.disabled = anyChecked;
    // }

    // Select or deselect all checkboxes
    // function toggleSelectAll() {
    //     var selectAllCheckbox = document.getElementById('selectAllCheckbox');
    //     var checkboxes = document.querySelectorAll('.deleteCheckbox');

    //     // Loop through all checkboxes
    //     checkboxes.forEach(function (checkbox) {
    //         // Only change the checked state if the checkbox is not disabled
    //         if (!checkbox.disabled) {
    //             checkbox.checked = selectAllCheckbox.checked;
    //         }
    //     });

    //     toggleDeleteButton(); // Re-enable/disable buttons based on checked state
    // }

    // Remove the row when delete button is clicked
    function deleteRow(button) {
        button.closest('tr').remove();
        toggleDeleteButton(); // Re-enable/disable buttons
    }
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.toggle-checkbox-status');

        checkboxes.forEach(checkbox => {
            const dataId = checkbox.getAttribute('data-id');
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
</script> --}}

{{-- <script>
    document.querySelectorAll('.toggle-checkbox-status').forEach(checkbox => {
        // Disable interaction for checkboxes with IDs 1-9 via JavaScript as well
        if (checkbox.id.startsWith('check-') && parseInt(checkbox.id.split('-')[1]) <= 9) {
            checkbox.disabled = true; // Ensure checkboxes 1-9 are not interactable
        }

        checkbox.addEventListener('change', function() {
            // Only apply the change if the checkbox is not disabled
            if (!this.disabled) {
                let questionId = this.getAttribute('data-id');
                let statusLabel = document.getElementById('isActive-' + questionId);

                // Toggle the 'Aktif' or 'Tidak Aktif' label based on checkbox state
                if (this.checked) {
                    statusLabel.innerHTML = "<b>Aktif</b>";
                } else {
                    statusLabel.innerHTML = "<b>Tidak Aktif</b>";
                }
            }
        });
    });
</script> --}}

<script>
    function addNewQuestion() {
        const tbody = document.querySelector('#questionTable tbody');
        const rows = tbody.getElementsByTagName('tr');
        const index = rows.length;
        
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

        const newCheckbox = newRow.querySelector('.toggle-checkbox');
        const statusLabel = document.getElementById(`isActive-new-${index}`);

        newCheckbox.addEventListener('change', function() {
            statusLabel.innerHTML = this.checked ? '<b>Aktif</b>' : '<b>Tidak Aktif</b>';
        });
    }
</script>

<script>
    document.getElementById('saveButton').addEventListener('click', function(e) {
        e.preventDefault(); // Prevent form submission by default

        // Show SweetAlert2 confirmation popup
        Swal.fire({
            title: 'Perubahan Anda Tidak Dapat Dikembalikan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Lanjutkan',
            cancelButtonText: 'Tidak, Kembali',
        }).then((result) => {
            if (result.isConfirmed) {
                // If "Yes, submit it!" is clicked, submit the form
                document.getElementById('questionForm').submit();
            }
        });
    });
</script>
@endsection