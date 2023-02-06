@extends('layouts.navbar')

@section('title','Students')

@section('content')
    
    <h2>Students Deleted page</h2>
    <div class="my-3 d-flex justify-content-between">
        <a href="/students" class="btn btn-primary">Back</a>
    </div>
    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
   
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Gender</th>
                <th>Action</th>
                {{-- <th>Kelas</th>
                <th>Ekskul</th>
                <th>Wali Kelas</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach ($StudentDeletedList as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->gender }}</td>
                <td> 
                    <a href="/student/{{ $item->id }}/restore" class="btn btn-success">Restore</a>    

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

@endsection('content')
