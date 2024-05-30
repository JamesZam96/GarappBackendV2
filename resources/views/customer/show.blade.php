<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Número: {{$customer->id}}</h1>
    <a href="{{route('customers.index')}}">Ir a la página principal</a>
    <br><br>
    <a href="{{route('customers.edit' , $customer)}}">Editar</a>

    <form action="{{route('customers.destroy', $customer)}}" method="POST">
        @csrf
        @method('DELETE')
        <br>
        <button type="submit">Eliminar</button>
    </form>   
</body>
</html>
