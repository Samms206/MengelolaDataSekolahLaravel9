@extends('layouts.navbar')

@section('title','Detail')


@section('content')
    <h2>Halaman dari Mata pelajaran {{ $mapel->mapel }}</h2>
    <ol>
        @foreach ($mapel->teacher as $item)
        <li>
            {{ $item->name }}
        </li>
         @endforeach
    </ol>
    
@endsection