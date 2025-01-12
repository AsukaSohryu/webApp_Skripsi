@extends('internal.layout.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-10">
            <div class="input-group">
                <input type="text" class="form-control rounded-1" id="searchForm" placeholder="Pencarian" onkeyup="searchForms()">
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="formTable">
        <thead class="thead">
            <tr class="fw-bold text-center border-2 border-bottom border-dark">
                <th scope="col">Formulir ID</th>
                <th scope="col">Nama Pengaju</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Status Formulir</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportForm as $r)
            <tr class="fw-bold text-center border-2 border-bottom border-dark py-auto">
                <td>
                    <div style="position: relative;">
                        @if($r->is_seen == 0)
                            <span class="text-danger" style="position: absolute; left: 0; top: 0;">!</span>
                        @endif
                        {{ $r->report_form_id }}
                    </div>
                </td>
                <td>{{ $r->users->name }}</td>
                <td>{{ $r->created_at }}</td>
                <td>
                    @php
                    $btnClass = 'btn-basic';
                    if (in_array($r->status->key, ['REQ'])) {
                        $btnClass = 'btn-secondary';
                    } elseif (in_array($r->status->key, ['ONP'])) {
                        $btnClass = 'btn-warning';
                    } elseif (in_array($r->status->key, ['RSC'])) {
                        $btnClass = 'btn-primary';
                    } elseif (in_array($r->status->key, ['NFD', 'OTH'])) {
                        $btnClass = 'btn-danger';
                    }
                    @endphp
                    <button class="btn {{ $btnClass }} noHover">{{ $r->status_name }}</button>  
                </td>
                <td class="d-flex justify-content-center d-row border-0" style="gap: 5px;">
                    <form action="{{route('formReport.detail', $r->report_form_id)}}" method="get">
                        <button class="btn btn-secondary border border-dark"><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                    <form action="{{ route('formReport.toggle.is_seen', $r->report_form_id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-primary border border-dark"><i class="fa-solid fa-eye-slash"></i></button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
    <table>
<div>
<script>
function searchForms() {
    var input = document.getElementById("searchForm");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("formTable");
    var tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) {
        var show = false;
        var tds = tr[i].getElementsByTagName("td");
        
        for (var j = 0; j < tds.length; j++) {
            var td = tds[j];
            if (td) {
                var txtValue = td.textContent || td.innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    show = true;
                    break;
                }
            }
        }
        
        tr[i].style.display = show ? "" : "none";
    }
}
</script>

@endsection