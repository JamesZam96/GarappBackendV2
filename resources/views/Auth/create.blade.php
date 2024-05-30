<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina para grear un user</title>
</head>
<body>
    <h1>Usuer</h1>
    <form action="{{route('auths.register')}}" method="POST">
        @csrf
        <label >Nombre completo
            <br>
            <input type="text" name="name" value="{{old('name')}}">
        </label>
        <br>
        @error('name')
            <span>{{$message}}</span>
        @enderror
        <label >correo
            <br>
            <input type="text" name="email" value="{{old('email')}}">
        </label>
        <br>
        @error('email')
        <span>{{$message}}</span>
        @enderror
        <label >correo de verificacion
            <br>
            <input type="text" name="email_verified_at" value="{{old('email_verified_at')}}">
        </label>
        @error('email_verified_at')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label >Contraseña
            <br>
            <input type="password" name="password" value="{{old('password')}}">
        </label>
        @error('password')
            <span>{{$message}}</span>
        @enderror
        <br><br>
        <button type="submit">crear</button>
    </form>
    
</body>
</html>