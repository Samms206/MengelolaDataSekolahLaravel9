@extends('layouts.navbar')

@section('title','Home')

@section('content')
    <h2>Selamat Datang {{ Auth::user()->name }}, Anda adalah  {{ Auth::user()->role->name }}</h2>
@endsection('content')

