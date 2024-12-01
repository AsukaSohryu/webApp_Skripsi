@extends('internal.layout.dashboard')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
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
                    @if($r->status_id == 1)
                        <span class="btn btn-secondary">Penyelematkan Diajukan</span>
                    @elseif($r->status_id == 2)
                        <span class="btn btn-warning">Dalam Proses Penyelematan</span>
                    @elseif($r->status_id == 3)
                        <span class="btn btn-primary">Hewan Sukses Diselamatkan</span>
                    @elseif($r->status_id == 4)
                        <span class="btn btn-danger">Hewan Tidak Ditemukan</span>
                    @elseif($r->status_id == 5)
                        <span class="btn btn-danger">Lainnya</span>
                    @endif
                </td> 
                <td>
                    <form action="{{route('formReport.detail', $r->report_form_id)}}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengupdate Laporan Ini?');">
                        <button class="btn btn-secondary border border-dark"><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
    <table>
<div>

@endsection