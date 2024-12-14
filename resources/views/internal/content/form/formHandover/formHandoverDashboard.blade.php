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
            @foreach ($handoverForm as $r)
            {{-- @php
                dd($handoverForm);
            @endphp --}}
            <tr class="fw-bold text-center border-2 border-bottom border-dark py-auto">
                <td>
                    <div style="position: relative;">
                        @if($r->is_seen == 0)
                            <span class="text-danger" style="position: absolute; left: 0; top: 0;">!</span>
                        @endif
                        {{ $r->handover_form_id }}
                    </div>
                </td>
                <td>{{ $r->users->name }}</td>
                {{-- <td>Testing</td> --}}
                <td>{{ $r->created_at }}</td>
                <td>
                    @if($r->status_id == 6)
                        <span class="btn btn-secondary">Penyerahan Diajukan</span>
                    @elseif($r->status_id == 7)
                        <span class="btn btn-warning">Pengajuan Penyerahan Disetujui</span>
                    @elseif($r->status_id == 8)
                        <span class="btn btn-danger">Pengajuan Penyerahan Ditolak</span>
                    @elseif($r->status_id == 9)
                        <span class="btn btn-primary">Penyerahan Berhasil</span>
                    @elseif($r->status_id == 10)
                        <span class="btn btn-danger">Penyerahan Dibatalkan</span>
                    @endif
                </td> 
                <td>
                    <form action="{{route('formHandover.detail', $r->handover_form_id)}}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengupdate Laporan Ini?');">
                        <button class="btn btn-secondary border border-dark"><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
    <table>
<div>

{{-- <div class="container">
    <form action="{{ route('formHandover.uploadGambar') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <input type="file" name="gambar" id="gambarWeb" class="form-control">
            </div>
        </div>
        <button>submit</button>
    </form>
</div> --}}

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