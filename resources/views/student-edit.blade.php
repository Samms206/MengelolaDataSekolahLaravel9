@extends('layouts.navbar')

@section('title','Student Edit')

@section('content')
    <div class="mt-5  col-6 m-auto">
        <form action="/student/{{ $student->id }}" method="POST">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}" required>
            </div>

            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                    @if ($student->gender == "L")
                        <option value="P">P</option>
                    @else
                        <option value="L">L</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis" class="form-control" value="{{ $student->nis }}" required>
            </div>

            <div class="mb-3">
                <label for="class">Kelas</label>
                <select name="class_id" id="class" class="form-control" required>
                    <option value="{{ $student->class->id }}">{{ $student->class->name }}</option>
                    @foreach ($class as $item)
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