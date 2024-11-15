@extends('internal.layout.dashboard')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
        <thead class="thead">
            <tr class="fw-bold text-center border-2 border-bottom border-dark">
                <th scope="col">ID Hewan</th>
                <th scope="col">Nama Hewan</th>
                <th scope="col">Tanggal Ditemukan</th>
                <th scope="col">Status Hewan</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animal as $a)
            <tr class="fw-bold text-center border-2 border-bottom border-dark py-auto">
                <td>{{ $a->animal_id }}</td>
                <td>{{ $a->animal_name }}</td>
                <td>{{ $a->created_at }}</td>
                <td>
                    @if($a->status_id == 16)
                        <span class="btn btn-primary">Baru Diselamatkan</span>
                    @elseif($a->status_id == 17)
                        <span class="btn btn-primary">Dalam Proses Perawatan</span>
                    @elseif($a->status_id == 18)
                        <span class="btn btn-primary">Tersedia Untuk Adopsi</span>
                    @elseif($a->status_id == 19)
                        <span class="btn btn-primary">Tidak Tersedia Untuk Adopsi</span>
                    @elseif($a->status_id == 20)
                        <span class="btn btn-primary">Dalam Proses Adopsi</span>
                    @elseif($a->status_id == 21)
                        <span class="btn btn-primary">Telah Diadopsi</span>
                    @elseif($a->status_id == 22)
                        <span class="btn btn-primary">Dikembalikan Pada Pemilik</span>
                    @endif
                </td> 
                <td>
                    <form action="{{route('dataHewan.detail', $a->animal_id)}}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengedit Hewan Ini?');">
                        <button class="btn btn-secondary border border-dark"><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- <div class="container">
    <form action="{{ route('animal.uploadGambar') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <input type="file" name="gambar" id="gambarWeb" class="form-control">
            </div>
        </div>
        <button>submit</button>
    </form>
</div> --}}
@endsection