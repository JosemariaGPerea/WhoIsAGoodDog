@extends('admin.layout')

@section('content')
<h2>Clientes</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id }}</td>
            <td>{{ $cliente->name }}</td>
            <td>{{ $cliente->email }}</td>
            <td>
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form method="POST" action="{{ route('clientes.destroy', $cliente->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
