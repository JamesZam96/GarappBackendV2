<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
            <li>
                <a href="">{{ $user->email }}</a>
                <a href="">{{ $user->name }}</a>
            </li>
    </ul>
    
    <form action="{{ route('auths.logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
    
   
</body>
</html>