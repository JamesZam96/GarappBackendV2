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
    <a href="{{ route('producs.create') }}">Crear un nuevo producto</a>
    <ul>
        @foreach ($producs as $produc)
            <li>
                <a href="{{ route('producs.show', $produc->id) }}">{{ $produc->name }}</a>
                <p>Precio: {{ $produc->price }}</p>
            </li>
        @endforeach
    </ul>
    {{ $producs->links() }}
</body>
</html>
