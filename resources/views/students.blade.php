@extends('layouts.navbar')

@section('title','Students')

@section('content')
    
    <h2>Students page</h2>

    <div class="my-3 d-flex justify-content-between">
        <a href="/student-add" class="btn btn-primary">Add</a>
        @if(Auth::user()->role_id == "1")  
        <a href="/students-deleted" class="btn btn-info">Restore Data</a>
        @endif
    </div>
    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    {{-- form Search --}}
    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="keyword">
                <button class="input-group-text btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Gender</th>
                <th>Kelas</th>
                <th>Action</th>
                {{-- <th>Kelas</th>
                <th>Ekskul</th>
                <th>Wali Kelas</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach ($studentList as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->class->name }}</td>
                <td> 
                    <a href="/students/{{ $item->id }}" class="btn btn-primary">Detail</a>    
                    <a href="/student-edit/{{ $item->id }}" class="btn btn-success">Edit</a>  
                    @if(Auth::user()->role_id == "1")  
                    <a href="/student-delete/{{ $item->id }}" class="btn btn-danger">Delete</a>    
                    @endif
                </td>
            {{-- menggunakan relasi dengan memanggil function class yg dibuat di model student --}}
                {{-- <td>{{ $item->class->name }}</td> --}}
                {{-- <td>{{ $item->class['name'] }}</td> --}}
                {{-- <td> --}}
                {{-- @foreach ( $item->extracurriculars as $data)
                    | {{ $data->name }}
                @endforeach --}}
                {{-- </td> --}}
                {{-- <td> --}}
                    {{-- {{ $item->class->homeroomteacher->name }} --}}
                {{-- </td> --}}
            </tr>
        @endforeach
        </tbody>
    </table>
<div class="my-5">
    {{-- {{ $studentList->links() }}--}}
    {{ $studentList->withQueryString()->links() }}
</div>
@endsection('content')
