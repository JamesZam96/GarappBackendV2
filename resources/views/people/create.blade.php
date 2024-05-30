<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina para grear un people</title>
</head>
<body>
    <h1>Aqui podras crear un people</h1>
    <form action="{{route('peoples.store')}}" method="POST">
        @csrf
        <label >Nombre completo
            <br>
            <input type="text" name="name" value="{{old('name')}}">
        </label>
        <br>
        @error('name')
            <span>{{$message}}</span>
        @enderror
        <label >Apellido completo
            <br>
            <input type="text" name="lastname" value="{{old('lastname')}}">
        </label>
        <br>
        @error('lastname')
        <span>{{$message}}</span>
        @enderror
        <label >Ingresa tu direccion
            <br>
            <input type="text" name="address" value="{{old('address')}}">
        </label>
        @error('address')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label >Ingresa tu numero de telefono
            <br>
            <input type="number" name="phoneNumber" value="{{old('phoneNumber')}}">
        </label>
        @error('phoneNumber')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label >Correo electronico
            <br>
            <input type="text" name="email" value="{{old('email')}}">
        </label>
        @error('email')
            <span>{{$message}}</span>
        @enderror
        <br><br>
        <button type="submit">crear</button>
    </form>
    
</body>
</html>