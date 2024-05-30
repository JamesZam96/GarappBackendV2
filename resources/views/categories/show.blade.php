<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Categoría</title>
</head>
<body>
    <h1>Detalles de la Categoría</h1>
    <p>NIT: {{ $category->nit }}</p>
    <p>Nombre del Establecimiento: {{ $category->companyname }}</p>
    
    <!-- Enlace para volver a la página principal -->
    <a href="{{ route('categorys.index') }}">Ir a la página principal</a>
    <br><br>

    <!-- Enlace para editar la categoría -->
    <a href="{{ route('categorys.edit', $category) }}">Editar</a>

    <!-- Formulario para eliminar la categoría -->
    <form action="{{ route('categorys.destroy', $category) }}" method="POST">
        @csrf
        @method('DELETE')

        <!-- Botón para enviar el formulario de eliminación -->
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
