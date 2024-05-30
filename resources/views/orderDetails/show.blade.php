<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body>
    <h1>orden numero {{$order->id}}</h1>
    <p>la cantidad es{{$order->quantity}}</p>
    <p>El precio unitario {{$order->unitprice}}</p>
    <p>El subtotal {{$order->subtotal}}</p>
    <a href="{{route('orders.index')}}">Ir a la pagina principal</a>
    <br><br>
    <a href="{{route('orders.edit' , $order)}}">Editar</a>

    <form action="{{route('orders.destroy', $order)}}" method="POST">
        @csrf
        @method('DELETE')
    <br>
<button type="submit">Eliminar</button>
</form>   
</body>
</html>