@extends('layouts.navbar')

@section('title','Detail')


@section('content')
    <h2>Halaman dari class {{ $class->name }}</h2>
    <table class="table">
        <tr>
            <th>Siswa</th>
            <th>Guru</th>
        </tr>
        <tr>
            <td>
                @foreach ($class->students as $item)
                    - {{ $item->name }} <br>
                @endforeach
            </td>
            <td>
                {{-- @foreach ($class->homeroomteacher as $data)
                    - {{ $data }} <br>
                @endforeach --}}
                {{ $class->homeroomteacher->name }}
            </td>
        </tr>
    </table>

@endsection