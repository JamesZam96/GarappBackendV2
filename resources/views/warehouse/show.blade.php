<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles del Establecimiento</title>
</head>
<body>
    <h1>Detalles del Establecimiento</h1>
    <p>NIT: {{ $companys->nit }}</p>
    <p>Nombre del Establecimiento: {{ $companys->companyname }}</p>
    
    <!-- Enlace para volver a la página principal -->
    <a href="{{ route('companys.index') }}">Ir a la página principal</a>
    <br><br>

    <!-- Enlace para editar el establecimiento -->
    <a href="{{ route('companys.edit', $companys) }}">Editar</a>

    <!-- Formulario para eliminar el establecimiento -->
    <form action="{{ route('companys.destroy', $companys) }}" method="POST">
        @csrf
        @method('DELETE')

        <!-- Botón para enviar el formulario de eliminación -->
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
