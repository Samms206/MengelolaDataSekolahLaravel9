@extends('layouts.navbar')

@section('title','Detail')


@section('content')
    <h2 class="my-3 d-flex justify-content-center">Halaman dari {{ $student->name }}</h2>

    <div class="my-3 d-flex justify-content-center">
        @if ($student->image != '')
            <img src="{{ asset('storage/photo/'.$student->image) }}" alt="" width="200px">   
        @else
            <img src="{{ asset('images/logo-pdp.png') }}" alt="" width="200px">
        @endif
        
    </div>
    <table class="table">
        <tr>
            <th>NIS</th>
            <th>Gender</th>
            <th>Kelas</th>
            <th>Wali Kelas</th>
        </tr>
        <tr>
            <td>
                {{ $student->nis }}
            </td>
            <td>
                {{ $student->gender }}
            </td>
            <td>
                {{ $student->class->name }}
            </td>
            <td>
                {{ $student->class->homeroomteacher->name }}
            </td>
            
        </tr>
    </table>
@endsection