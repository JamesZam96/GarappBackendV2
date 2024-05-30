<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a la página principal de compañías</title>
</head>
<body>
    <h1>Establecimiento</h1>
    <a href="{{ route('companys.create') }}">Crear un Establecimiento</a>

    <ul>
        @foreach ($companys as $company)
            <li>
                <a href="{{ route('companys.show', $company->id) }}">
                    Nombre: {{ $company->name }}
                </a>
                <p>Dirección: {{ $company->address }}</p>
                <p>Teléfono: {{ $company->phone }}</p>
            </li>
        @endforeach
    </ul>
    
    {{ $companys->links() }} <!-- Agrega la paginación -->
</body>
</html>
