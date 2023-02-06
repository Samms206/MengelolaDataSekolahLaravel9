@extends('layouts.navbar')

@section('title','Mapel Add')

@section('content')
<div class="mt-5  col-6 m-auto">
    <form action="/mapels/{{ $mapel->id }}" method="post">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="name">Mata Pelajaran Baru</label>
            <input type="text" name="mapel" id="name" class="form-control" value="{{ $mapel->mapel }}" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection