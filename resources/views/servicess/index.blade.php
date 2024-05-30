<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Servicios</title>
</head>
<body>
    <h1>Lista de Servicios</h1>
    <a href="{{ route('services.create') }}">Crear un nuevo servicio</a>
    <ul>
        @foreach ($services as $service)
            <li>
                <a href="{{ route('services.show', $service->id) }}">{{ $service->name }}</a>
                <p>Descripción: {{ $service->description }}</p>
                <p>Precio: {{ $service->price }}</p>
            </li>
        @endforeach
    </ul>
    {{ $services->links() }}
</body>
</html>
