@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">

        <h3>Iniciar sesión</h3>
        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input name="email" type="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Contraseña</label>
                <input name="password" type="password" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Entrar</button>

            <div class="mt-2 text-center">
                <a href="/register">Crear cuenta</a>
            </div>
        </form>

    </div>
</div>
@endsection
