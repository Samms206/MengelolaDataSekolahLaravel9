@extends('layouts.navbar')

@section('title','Students')

@section('content')
<h2>Pilih Ekstrakurikuler untuk Siswa {{ $dataStudent->name }}</h2>
<form action="/add_student_ekskul/{{$dataStudent->id }}" method="post">
    @csrf
    <input type="hidden" name="student_id" value="{{ $dataStudent->id }}">
    <div class="form-group mb-2">

        @foreach ($extracurriculars as $extracurricular)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="extracurricular_ids[]" 
            value="{{ $extracurricular->id }}" {{ in_array($extracurricular->id, $student_extracurricular_ids) ? 'checked' : '' }}>
            <label class="form-check-label">{{ $extracurricular->name }}</label>
        </div>
        @endforeach
        
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  
@endsection('content')
