@extends('layouts.navbar')

@section('title','Teacher Update')

@section('content')
<div class="mt-5  col-6 m-auto">
    <form action="/teacher/{{ $teacher->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Nama Guru</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}" required>
        </div>

        <div class="mb-3">
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" value="{{ $teacher->nip }}" required>
        </div>

        <div class="mb-3">
            <label for="mapel">Mata Pelajaran</label>
            <select name="mapel_id" id="mapel" class="form-control" required>
                <option value="{{ $teacher->mapel->id }}">{{ $teacher->mapel->mapel }}</option>
                @foreach ($mapel as $item)
                    <option value="{{ $item->id }}">{{ $item->mapel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection