<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a la página principal de categorías</title>
</head>
<body>
    <h1>Regístrate como categoría</h1>
    <a href="{{ route('categorys.create') }}">Crear una categoría</a>
    <ul>
        @foreach ($categories as $category)
            <li><a href="{{ route('categorys.show', $category->id) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</body>
</html>
