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
            @foreach ($adoptionForm as $r)
            <tr class="fw-bold text-center border-2 border-bottom border-dark py-auto">
                <td>{{ $r->adoption_form_id }}</td>
                <td>{{ $r->users->name }}</td>
                <td>{{ $r->created_at }}</td>
                <td>
                    @if($r->status_id == 11)
                        <span class="btn btn-primary">Adopsi Diajukan</span>
                    @elseif($r->status_id == 12)
                        <span class="btn btn-primary">Pengajuan Adopsi Disetujui</span>
                    @elseif($r->status_id == 13)
                        <span class="btn btn-primary">Pengajuan Adopsi Ditolak</span>
                    @elseif($r->status_id == 14)
                        <span class="btn btn-primary">Adopsi Berhasil</span>
                    @elseif($r->status_id == 15)
                        <span class="btn btn-primary">Adopsi Dibatalkan</span>
                    @endif
                </td> 
                <td>
                    <form action="{{route('formAdopsi.detail', $r->adoption_form_id)}}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengupdate Laporan Ini?');">
                        <button class="btn btn-secondary border border-dark"><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
    <table>
<div>

@endsection