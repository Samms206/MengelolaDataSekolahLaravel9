@extends('layouts.navbar')

@section('title','Class Edit')

@section('content')
<div class="mt-5  col-6 m-auto">
    <form action="/class/{{ $class->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name">Kelas</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $class->name }}" required>
        </div>

        <div class="mb-3">
            <label for="teacher">Wali Kelas</label>
            <select name="teacher_id" id="teacher" class="form-control" required>
                <option value="{{ $class->homeroomteacher->id }}">{{ $class->homeroomteacher->name }}</option>
                @foreach ($teacher as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection