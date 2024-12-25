@extends('internal.layout.dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-10">
            <div class="input-group">
                <input type="text" class="form-control rounded-1" id="searchAnimal" placeholder="Pencarian" onkeyup="searchAnimals()">
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="animalTable">
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
            @foreach ($animals as $a)
            <tr class="fw-bold text-center border-2 border-bottom border-dark py-auto">
                <td>{{ $a->animal_id }}</td>
                <td>{{ $a->animal_name }}</td>
                <td>{{ $a->created_at }}</td>
                <td>{{ $a->status_name }}</td>
                <td>
                    <form action="{{route('dataHewan.detail', $a->animal_id)}}" method="get" onsubmit="return confirm('Apakah Anda Ingin Mengedit Hewan Ini?');">
                        <button class="btn btn-secondary border border-dark"><i class="fa-regular fa-pen-to-square"></i></button>
                    </form>
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('dataHewan.create') }}" class="btn btn-success">
            <i class="fas fa-plus me-2"></i>Tambah Hewan
        </a>
    </div>
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

<script>
function searchAnimals() {
    var input = document.getElementById("searchAnimal");
    var filter = input.value.toLowerCase();
    var table = document.getElementById("animalTable");
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