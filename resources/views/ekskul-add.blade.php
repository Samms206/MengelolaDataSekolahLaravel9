@extends('layouts.navbar')

@section('title','Ekskul Add')

@section('content')
<div class="mt-5  col-6 m-auto">
    <form action="/extracurricular" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Ekstrakurikuler Baru</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection