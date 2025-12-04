@extends('admin.layout')

@section('content')

<h2>Editar Perro</h2>

<form action="{{ route('perros.update', $perro->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

      <div class="mb-3">
                    <label class="form-label">Foto del Perro</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
    <label>Nombre</label>
    <input name="nombre" value="{{ $perro->nombre }}" class="form-control" required>

    <label>Edad</label>
    <input type="number" name="edad" value="{{ $perro->edad }}" class="form-control" required>

    <label>Raza</label>
    <input name="raza" value="{{ $perro->raza }}" class="form-control" required>

    <label>Tamaño</label>
    <input name="tamaño" value="{{ $perro->tamaño }}" class="form-control" required>

    <label>Descripción</label>
    <textarea name="descripcion" class="form-control" required>{{ $perro->descripcion }}</textarea>

    <label>Estado</label>
    <select name="estado" class="form-control">
        <option {{ $perro->estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
        <option {{ $perro->estado == 'Adoptado' ? 'selected' : '' }}>Adoptado</option>
    </select>

    <label>Foto nueva (opcional)</label>
    <input type="file" name="foto" class="form-control">

    @if($perro->foto)
        <p>Foto actual:</p>
        <img src="{{ asset('storage/' . $perro->foto) }}" width="120">
    @endif

    <button class="btn btn-primary mt-3">Actualizar</button>
</form>

@endsection
