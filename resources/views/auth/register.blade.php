@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">

        <h3>Crear cuenta</h3>
        <form method="POST" action="/register">
            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input name="email" type="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Contraseña</label>
                <input name="password" type="password" class="form-control" required>
            </div>

            <button class="btn btn-success w-100">Registrar</button>

            <div class="mt-2 text-center">
                <a href="/login">Ya tengo cuenta</a>
            </div>
        </form>

    </div>
</div>
@endsection
