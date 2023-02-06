@extends('layouts.navbar')

@section('title','Detail')


@section('content')
    <h2>Halaman dari {{ $teacher->name }}</h2>
    <table class="table">
        <tr>
            <th>Mata Pelajran</th>
        </tr>
        <tr>
            <td>
                {{ $teacher->mapel->mapel }}
            </td>
        </tr>
    </table>
@endsection