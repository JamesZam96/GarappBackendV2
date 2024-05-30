<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
</head>
<body>
    <h1>En esta pagina podras editar una orden</h1>
    <form action="{{ route('deliverys.update' , $delivery) }}" method="POST">
    @csrf
        @method('patch')
        <label >Numero de licencia
            <br>
            <input type="text" name="licenseNumber" value="{{old('licenseNumber')}}">
        </label>
        <br>
        @error('licenseNumber')
            <span>{{$message}}</span>
        @enderror
        <br><br>
        <button type="submit">Actualizar</button>
    </form>
    
</body>
</html>