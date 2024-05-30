<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Orden</title>
</head>
<body>
    <h1>Crear una Orden</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf <!-- Directiva de Blade para agregar el token CSRF -->

        <label>Fecha:
            <br>
            <input type="date" name="date" value="{{ old('date') }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('date')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <label>Estado:
            <br>
            <input type="text" name="state" value="{{ old('state') }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('state')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <button type="submit">Crear</button>
    </form>
</body>
</html>
