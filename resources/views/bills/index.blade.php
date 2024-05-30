<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a la página principal de facturas</title>
</head>
<body>
    <h1>Lista de Facturas</h1>
    <a href="{{ route('bills.create') }}">Crear una nueva factura</a>
    <ul>
        @foreach ($bills as $bill)
            <li>
                <a href="{{ route('bills.show', $bill->id) }}">Factura: {{ $bill->id }}</a>
                <p>Fecha: {{ $bill->date }}</p>
                <p>Total: ${{ $bill->totalprice }}</p>
            </li>
        @endforeach
    </ul>
    {{ $bills->links() }}
</body>
</html>
