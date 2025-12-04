<!DOCTYPE html>
<html>
<head>
    <title>Admin - @yield('title', 'Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">ADMIN</a>
        <a href="/" class="btn btn-secondary">Salir</a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
