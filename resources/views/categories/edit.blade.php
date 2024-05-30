<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Categoría</title>
</head>
<body>
    <h1>Editar Categoría</h1>
    <form action="{{ route('categorys.update', $category->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label>Nombre
            <br>
            <input type="text" name="name" value="{{ old('name', $category->name) }}">
        </label>
        <br>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Descripción
            <br>
            <input type="text" name="description" value="{{ old('description', $category->description) }}">
        </label>
        <br>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
