@extends('layouts.navbar')

@section('title','Class')


@section('content')
    <h2>class page</h2>
    <div class="my-3">
        @if(Auth::user()->role == "1")  
        <a href="/class-add" class="btn btn-primary">Add</a>
        @endif
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
                <th>Nama Kelas</th>
                @if(Auth::user()->role == "1")  
                <th>Action</th>
                @endif
                {{-- <th>Siswa</th>
                <th>Wali Kelas</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach ($classList as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                {{-- <td>
                    @foreach ($item->students as $data)
                        - {{ $data->name }} <br>
                    @endforeach
                </td>
                <td>
                    {{ $item->homeroomteacher->name }}
                </td> --}}
                <td>
                    @if(Auth::user()->role == "1")  
                    <a href="/class-detail/{{ $item->id }}" class="btn btn-primary">Detail</a>
                    <a href="/class-edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection('content')
