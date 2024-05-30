<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido {{$people->name}} {{$people->lastname}}</h1>
    <p>Tu direccion es {{$people->address}}</p>
    <p>Tu numero de celular es {{$people->phoneNumber}}</p>
    <p>Tu correo electronico es {{$people->email}}</p>
    <a href="{{route('peoples.index')}}">Ir a la pagina principal</a>
    <br><br>
    <a href="{{route('peoples.edit' , $people)}}">Editar</a>

    <form action="{{route('peoples.destroy', $people)}}" method="POST">
        @csrf
        @method('DELETE')
    <br>
<button type="submit">Eliminar</button>
</form>   
</body>
</html>