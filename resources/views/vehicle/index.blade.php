<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a la página principal de vehículos</title>
</head>
<body>
    <h1>Lista de Vehículos</h1>
    <a href="{{ route('vehicles.create') }}">Crear un nuevo vehículo</a>
    <ul>
        @foreach ($vehicles as $vehicle)
            <li>
                <a href="{{ route('vehicles.show', $vehicle->id) }}">{{ $vehicle->brand }}</a>
            </li>
        @endforeach
    </ul>
    {{ $vehicles->links() }}
</body>
</html>
