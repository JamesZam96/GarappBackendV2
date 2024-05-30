<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles del Servicio</title>
</head>
<body>
    <h1>Detalles del Servicio</h1>
    <p>Nombre: {{ $service->name }}</p>
    <p>Descripción: {{ $service->description }}</p>
    <p>Precio: {{ $service->price }}</p>
    <a href="{{ route('services.index') }}">Ir a la página principal</a>
    <br><br>
    <a href="{{ route('services.edit', $service) }}">Editar</a>

    <form action="{{ route('services.destroy', $service) }}" method="POST">
        @csrf
        @method('DELETE')
        <br>
        <button type="submit">Eliminar</button>
    </form>   
</body>
</html>
