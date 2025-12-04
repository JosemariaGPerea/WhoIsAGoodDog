@extends('layout')

@section('content')

<h2>Dashboard</h2>

@if(auth()->user()->rol === 'admin')
    <div class="alert alert-info">
        <b>Bienvenido administrador {{ auth()->user()->name }}</b>
    </div>

    <ul class="list-group">
        <li class="list-group-item"><a href="/perros">Administrar perros</a></li>
        <li class="list-group-item"><a href="/clientes">Administrar clientes</a></li>
        <li class="list-group-item"><a href="/citas">Ver citas</a></li>
    </ul>

@else
    <div class="alert alert-success">
        <b>Bienvenido {{ auth()->user()->name }}</b>
    </div>

    <ul class="list-group">
        <li class="list-group-item"><a href="/mis-perros">Mis perros adoptados</a></li>
        <li class="list-group-item"><a href="/mis-citas">Mis citas</a></li>
    </ul>
@endif

@endsection
