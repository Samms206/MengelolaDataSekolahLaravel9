@extends('layouts.navbar')

@section('title','Ekskul')


@section('content')
    <h2>Extracurricular Page</h2>
    <div class="my-3">
        @if(Auth::user()->role == "1")  
        <a href="/ekskul-add" class="btn btn-primary">Add</a>
        <a href="/ekskul-student-add" class="btn btn-success">Add Ekskul for Student</a>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Ekstrakurikuler</th>
                @if(Auth::user()->role == "1")  
                <th>Action</th>
                @endif
                {{-- <th>Siswa</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach ($ekskulList as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                {{-- <td>
                    @foreach ( $item->students as $data )
                        -{{ $data->name }} <br>
                    @endforeach
                </td> --}}
                <td>
                    @if(Auth::user()->role == "1")  
                    <a href="extracurricular/{{ $item->id }}" class="btn btn-primary">Detail</a>
                    <a href="extracurricular-edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection('content')
