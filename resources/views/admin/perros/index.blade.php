@extends('admin.layout')

@section('content')

<h2>Lista de Perros</h2>
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div style="display:flex; gap:10px; margin-bottom:20px;">
    <a href="{{ route('perros.export') }}" class="btn btn-success">Exportar Excel</a>

    <form action="{{ route('perros.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button class="btn btn-primary">Importar Excel</button>
    </form>
</div>

<a href="{{ route('perros.create') }}" class="btn btn-primary mb-3">Agregar Perro</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Raza</th>
            <th>Edad</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($perros as $perro)
        <tr>
            <td>
                @if($perro->foto)
                    <img src="{{ asset('storage/' . $perro->foto) }}" width="80">
                @endif
            </td>
            <td>{{ $perro->nombre }}</td>
            <td>
    <a href="https://api.thedogapi.com/v1/breeds/{{ $perro->raza_id }}" target="_blank">
        {{ $perro->raza->nombre }}
    </a>
    </td>
            <td>{{ $perro->edad }}</td>
            <td>{{ $perro->estado }}</td>
            <td>
                <a href="{{ route('perros.show', $perro->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('perros.edit', $perro->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('perros.destroy', $perro->id) }}" 
                      method="POST" style="display: inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
