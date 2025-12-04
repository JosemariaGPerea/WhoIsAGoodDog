<!DOCTYPE html>
<html>
<head>
    <title>Panel Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container py-4">

    <h1 class="mb-4">Panel de Administración</h1>

    <div class="list-group">
        <a href="{{ route('perros.index') }}" class="list-group-item list-group-item-action">📌 Gestión de Perros</a>
        <a href="{{ route('clientes.index') }}" class="list-group-item list-group-item-action">👥 Gestión de Clientes</a>
        <a href="{{ route('admin.citas') }}" class="list-group-item list-group-item-action">📅 Citas</a>
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action">📁 Importar / Exportar Datos</a>
    </div>

</div>

</body>
</html>
