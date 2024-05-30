<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina para registrar un servicio</title>
</head>
<body>
    <h1>Aqui podrás registrar un nuevo servicio</h1>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <label>Nombre del servicio:
            <br>
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <br>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Descripción del servicio:
            <br>
            <input type="text" name="description" value="{{ old('description') }}">
        </label>
        <br>
        @error('description')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Precio del servicio:
            <br>
            <input type="number" name="price" value="{{ old('price') }}">
        </label>
        <br>
        @error('price')
            <span>{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit">Crear servicio</button>
    </form>
</body>
</html>
