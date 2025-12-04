@extends('admin.layout')

@section('content')

<h2>Detalles del Perro</h2>

@if($perro->foto)
    <img src="{{ asset('storage/'.$perro->foto) }}" width="200" class="mb-3">
@endif

<ul class="list-group">
    <li class="list-group-item"><strong>Nombre:</strong> {{ $perro->nombre }}</li>
    <li class="list-group-item"><strong>Edad:</strong> {{ $perro->edad }}</li>
    <li class="list-group-item"><strong>Raza:</strong> {{ $perro->raza }}</li>
    <li class="list-group-item"><strong>Estado:</strong> {{ $perro->estado }}</li>
    <li class="list-group-item"><strong>Descripción:</strong><br>{{ $perro->descripcion }}</li>
</ul>

<a href="{{ route('perros.pdf', $perro->id) }}" class="btn btn-success">Descargar PDF</a>

<a href="{{ route('perros.index') }}" class="btn btn-secondary mt-3">Volver</a>

@endsection
