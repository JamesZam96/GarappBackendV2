<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Almacén</title>
</head>
<body>
    <h1>Crear un Almacén</h1>
    <form action="" method="POST">
        @csrf <!-- Directiva de Blade para agregar el token CSRF -->

        <label>NIT:
            <br>
            <input type="number" name="nit" value="{{ old('nit') }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('nit')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <label>Nombre del Establecimiento:
            <br>
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('name')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <label>Dirección:
            <br>
            <input type="text" name="address" value="{{ old('address') }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('address')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <label>Correo:
            <br>
            <input type="text" name="email" value="{{ old('email') }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('email')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <label>Telefono
            <br>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('phone')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <button type="submit">Crear</button>
    </form>
</body>
</html>
