<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Numero{{$delivery->id}}</h1>
    <p>Numero de licencia{{$delivery->licenseNumber}}</p>
    <a href="{{route('deliverys.index')}}">Ir a la pagina principal</a>
    <br><br>
    <a href="{{route('deliverys.edit' , $delivery)}}">Editar</a>

    <form action="{{route('deliverys.destroy', $delivery)}}" method="POST">
        @csrf
        @method('DELETE')
    <br>
<button type="submit">Eliminar</button>
</form>   
</body>
</html>