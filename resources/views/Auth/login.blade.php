<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <h1>Usuer</h1>
    <form action="" method="POST">
        @csrf
        <label >iniciar sesion
            <br>
            <input type="text" name="email" value="{{old('email')}}">
        </label>
        <br>
        @error('email')
            <span>{{$message}}</span>
        @enderror
        <label >Contraseña
            <br>
            <input type="password" name="password" value="{{old('password')}}">
        </label>
        <br>
        @error('password')
        <span>{{$message}}</span>
        @enderror
        <br><br>
        <button type="submit">entrar</button>
        
    </form>
    
</body>
</html>