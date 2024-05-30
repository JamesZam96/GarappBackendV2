<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a la página principal de órdenes</title>
</head>
<body>
    <h1>Lista de Órdenes</h1>
    <a href="{{ route('orders.create') }}">Crear un nuevo detalle de orden</a>
    <ul>
        @foreach ($orders as $order)
            <li>
                <a href="{{ route('orders.show', $order->id) }}">Detalle de Orden: {{ $order->id }}</a>
                <p>Cantidad: {{ $order->quantity }}</p>
                <p>Precio Unitario: {{ $order->unitprice }}</p>
                <p>Subtotal: {{ $order->subtotal }}</p>
            </li>
        @endforeach
    </ul>
    {{ $orders->links() }}
</body>
</html>
