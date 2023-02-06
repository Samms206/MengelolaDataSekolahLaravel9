@extends('layouts.navbar')

@section('title','Mapel')

@section('content')
    <h3>Page Mapels</h3>
    <div class="my-3">
        @if(Auth::user()->role_id == "1")
        <a href="/mapel-add" class="btn btn-primary">Add</a>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Mata Pelajaran</th>
                <th>Action</th>
                {{-- <th>Pengajar</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach ($mapelsList as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->mapel }}</td>
                {{-- <td>
                @foreach ( $item->teacher as $data)
                    - {{ $data->name }} <br>
                @endforeach 
                 </td> --}}
                 <td>
                    @if(Auth::user()->role_id == "1")
                    <a href="mapels/{{ $item->id }}" class="btn btn-primary">Detail</a> 
                    <a href="mapel-edit/{{ $item->id }}" class="btn btn-success">Edit</a> 
                    <form action="/mapels/{{ $item->id }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure?');">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection