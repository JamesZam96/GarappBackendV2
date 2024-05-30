<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Factura</title>
</head>
<body>
    <h1>Editar Factura</h1>
    <form action="{{ route('bills.update', $bill) }}" method="POST">
        @csrf
        @method('patch')
        <label>Fecha:
            <br>
            <input type="date" name="date" value="{{ old('date', $bill->date) }}">
        </label>
        <br>
        @error('date')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Total:
            <br>
            <input type="number" name="totalprice" value="{{ old('totalprice', $bill->totalprice) }}">
        </label>
        <br>
        @error('totalprice')
            <span>{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit">Actualizar Factura</button>
    </form>
</body>
</html>
