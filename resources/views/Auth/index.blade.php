<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a la página principal de productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    @auth
        <a href="{{ route('auths.create') }}">Crear un nuevo producto</a>
    @endauth
    <a href="/login">Iniciar sesion</a>
</body>
</html>
