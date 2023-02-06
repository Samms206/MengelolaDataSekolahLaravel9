@extends('layouts.navbar')

@section('title','Ekskul Edit')

@section('content')
<div class="mt-5  col-6 m-auto">
    <form action="/extracurricular/{{ $ekskul->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Ekstrakurikuler</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $ekskul->name }}" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection