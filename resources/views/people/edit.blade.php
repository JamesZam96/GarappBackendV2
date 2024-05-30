<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
</head>
<body>
    <h1>En esta pagina podras editar un people</h1>
    <form action="{{ route('peoples.update', $people) }}" method="POST">
    @csrf
        @method('put')
        <label >Nombre completo
            <br>
            <input type="text" name="name" value="{{old('name',$people->name)}}">
        </label>
        <br>
        @error('name')
            <span>{{$message}}</span>
        @enderror
        <label >Apellido completo
            <br>
            <input type="text" name="lastname" value="{{old('lastname',$people->lastname)}}">
        </label>
        <br>
        @error('lastname')
        <span>{{$message}}</span>
        @enderror
        <label >Ingresa tu direccion
            <br>
            <input type="text" name="address" value="{{old('address',$people->address)}}">
        </label>
        @error('address')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label >Ingresa tu numero de telefono
            <br>
            <input type="number" name="phoneNumber" value="{{old('phoneNumber',$people->phoneNumber)}}">
        </label>
        @error('phoneNumber')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label >Correo electronico
            <br>
            <input type="text" name="email" value="{{old('email',$people->email)}}">
        </label>
        @error('email')
            <span>{{$message}}</span>
        @enderror
        <br><br>
        <button type="submit">Actualizar</button>
    </form>
    
</body>
</html>