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
            @foreach ($handoverForm as $r)
            {{-- @php
                dd($handoverForm);
            @endphp --}}
            <tr class="fw-bold text-center border-2 border-bottom border-dark py-auto">
                <td>{{ $r->handover_form_id }}</td>
                <td>{{ $r->users->name }}</td>
                {{-- <td>Testing</td> --}}
                <td>{{ $r->created_at }}</td>
                <td>
                    @if($r->status_id == 6)
                        <span class="btn btn-primary">Penyerahan Diajukan</span>
                    @elseif($r->status_id == 7)
                        <span class="btn btn-primary">Pengajuan Penyerahan Disetujui</span>
                    @elseif($r->status_id == 8)
                        <span class="btn btn-primary">Pengajuan Penyerahan Ditolak</span>
                    @elseif($r->status_id == 9)
                        <span class="btn btn-primary">Penyerahan Berhasil</span>
                    @elseif($r->status_id == 10)
                        <span class="btn btn-primary">Penyerahan Dibatalkan</span>
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

@endsection