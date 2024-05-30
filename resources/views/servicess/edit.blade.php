<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina para editar un servicio</title>
</head>
<body>
    <h1>Aquí podrás editar el servicio</h1>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('patch')
        <label>Nombre
            <br>
            <input type="text" name="name" value="{{ old('name', $service->name) }}">
        </label>
        <br>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <label>Descripción
            <br>
            <input type="text" name="description" value="{{ old('description', $service->description) }}">
        </label>
        <br>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
        <label>Precio
            <br>
            <input type="number" name="price" value="{{ old('price', $service->price) }}">
        </label>
        <br>
        @error('price')
            <span>{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
