<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página para crear una categoría</title>
</head>
<body>
    <h1>Aquí podrás crear una categoría</h1>
    <form action="{{ route('categorys.store') }}" method="POST">
        @csrf
        <label>Nombre
            <br>
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <br>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Descripción
            <br>
            <input type="text" name="description" value="{{ old('description') }}">
        </label>
        <br>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
