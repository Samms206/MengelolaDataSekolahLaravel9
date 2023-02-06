@extends('layouts.navbar')

@section('title','Teacher')

@section('content')
    <h2>teachers page</h2>
    <div class="my-3">
        @if(Auth::user()->role_id == "1")  
        <a href="/teacher-add" class="btn btn-primary">Add</a>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Action</th>
                {{-- <th>Mapel</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach ($teachersList as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nip }}</td>
                <td>
                    @if(Auth::user()->role_id == "1")  
                    <a href="/teachers/{{ $item->id }}" class="btn btn-primary">Detail</a>
                    <a href="/teacher-edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                    <form action="/teacher/{{ $item->id }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure?');">Delete</button>
                    </form>
                    @endif
                </td>
                {{-- <td>{{ $item->mapel->mapel }}</td> --}}
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection('content')
