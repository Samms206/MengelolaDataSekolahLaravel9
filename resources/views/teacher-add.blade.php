@extends('layouts.navbar')

@section('title','Teacher Add')

@section('content')
<div class="mt-5  col-6 m-auto">
    <form action="teacher" method="post" >
        @csrf
        <div class="mb-3">
            <label for="name">Nama Guru</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="mapel">Mata Pelajaran</label>
            <select name="mapel_id" id="mapel" class="form-control" required>
                <option value="">Pilih salah satu</option>
                @foreach ($mapel as $item)
                    <option value="{{ $item->id }}">{{ $item->mapel }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection