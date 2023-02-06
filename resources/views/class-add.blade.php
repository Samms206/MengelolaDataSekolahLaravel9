@extends('layouts.navbar')

@section('title','Class Add')

@section('content')
<div class="mt-5  col-6 m-auto">

    {{-- menampilkan notif eror --}}
    @if ($errors->any()){
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    }
    @endif

    <form action="/class" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Kelas</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="teacher">Wali Kelas</label>
            <select name="teacher_id" id="teacher" class="form-control" required>
                <option value="">Pilih salah satu</option>
                @foreach ($teacher as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection