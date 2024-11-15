@extends('internal.layout.dashboard')

@section('content')
<div class="card mb-5 mb-xxl-8">
    <div class="card-body py-9">
        <h1 class="text-center">Detail Data Hewan</h1>
        <div class="row">
            <div class="col my-3">
                <img src="{{ asset('upload/files/banners/'.$banner->image) }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection