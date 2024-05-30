<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de la Orden</title>
</head>
<body>
    <h1>Detalles de la Orden</h1>
    <p>Fecha: {{ $order->date }}</p>
    <p>Estado: {{ $order->state }}</p>
    <a href="{{ route('orders.index') }}">Ir a la página principal</a>
    <br><br>
    <a href="{{ route('orders.edit', $order) }}">Editar</a>

    <form action="{{ route('orders.destroy', $order) }}" method="POST">
        @csrf
        @method('DELETE')
        <br>
        <button type="submit">Eliminar</button>
    </form>   
</body>
</html>
