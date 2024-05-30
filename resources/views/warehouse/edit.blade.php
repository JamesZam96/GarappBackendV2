<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="{{ route('companys.update', $companys) }}" method="POST">
        @csrf <!-- Directiva de Blade para agregar el token CSRF -->
        @method('patch') <!-- Utilizado para enviar el método PATCH -->

        <label>NIT:
            <br>
            <input type="number" name="nit" value="{{ old('nit', $companys->nit) }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('nit')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <label>Nombre del Establecimiento:
            <br>
            <input type="text" name="companyname" value="{{ old('companyname', $companys->companyname) }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('companyname')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <label>Dirección:
            <br>
            <input type="text" name="address" value="{{ old('address', $companys->address) }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('address')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <label>Correo:
            <br>
            <input type="text" name="email" value="{{ old('email', $companys->email) }}">
        </label>
        <br>
        <!-- Mostrar errores de validación -->
        @error('email')
            <span>{{ $message }}</span>
            <br><br>
        @enderror

        <br><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
