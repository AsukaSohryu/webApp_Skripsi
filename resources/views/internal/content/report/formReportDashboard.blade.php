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
                <td>{{ $r->report_form_id }}</td>
                <td>{{ $r->user->name }}</td>
                <td>{{ $r->created_at }}</td>
                <td>{{ $r->status->status }}</td> 
                {{-- <td>
                    <form action="{{route('reportForm.detail', $r->report_form_id)}}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengedit Hewan Ini?');">
                        <button class="btn btn-secondary border border-dark"><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td>  --}}
            </tr>
            @endforeach
        </tbody>
    <table>
<div>

@endsection