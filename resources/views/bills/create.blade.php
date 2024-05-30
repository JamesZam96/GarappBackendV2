<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página para crear una nueva factura</title>
</head>
<body>
    <h1>Aquí podrás crear una nueva factura</h1>
    <form action="{{ route('bills.store') }}" method="POST">
        @csrf
        <label>Fecha:
            <br>
            <input type="date" name="date" value="{{ old('date') }}">
        </label>
        <br>
        @error('date')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Total:
            <br>
            <input type="number" name="totalprice" value="{{ old('totalprice') }}">
        </label>
        <br>
        @error('totalprice')
            <span>{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit">Crear factura</button>
    </form>
</body>
</html>
