<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="{{ route('producs.update', $produc) }}" method="POST">
        @csrf
        @method('patch')
        <label>Nombre:
            <br>
            <input type="text" name="name" value="{{ old('name', $produc->name) }}">
        </label>
        <br>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Descripción:
            <br>
            <input type="text" name="description" value="{{ old('description', $produc->description) }}">
        </label>
        <br>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Precio:
            <br>
            <input type="number" name="price" value="{{ old('price', $produc->price) }}">
        </label>
        <br>
        @error('price')
            <span>{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
