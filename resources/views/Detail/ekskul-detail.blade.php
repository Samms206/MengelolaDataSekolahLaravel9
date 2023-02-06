@extends('layouts.navbar')

@section('title','Detail')


@section('content')
    <h2>Halaman dari ekskul {{ $ekskul->name }}</h2>
    <ol>
            
        @foreach ($ekskul->students as $item)
        <li>
            {{ $item->name }}
        </li>
        @endforeach
        
    </ol>
@endsection