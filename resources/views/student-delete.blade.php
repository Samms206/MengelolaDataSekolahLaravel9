@extends('layouts.navbar')

@section('title','Student Delete')

@section('content')
    <div class="container">
        <h2>Anda yakin ingin menghapus data dari {{ $student->name }}({{ $student->nis }})</h2>
        <form action="/student-destroy/{{ $student->id }}" method="POST" style="display: inline-block">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="/students" class="btn btn-primary">Cancel</a>
    </div>
@endsection