<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Factura</title>
</head>
<body>
    <h1>Detalles de la Factura</h1>
    <p>Fecha: {{ $bill->date }}</p>
    <p>Total: {{ $bill->totalprice }}</p>
    <a href="{{ route('bills.index') }}">Ir a la página principal de facturas</a>
    <br><br>
    <a href="{{ route('bills.edit', $bill) }}">Editar</a>

    <form action="{{ route('bills.destroy', $bill) }}" method="POST">
        @csrf
        @method('DELETE')
        <br>
        <button type="submit">Eliminar</button>
    </form>   
</body>
</html>
