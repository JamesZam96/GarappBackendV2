<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina para grear un repartidor</title>
</head>
<body>
    <h1>crear un repartidor</h1>
    <form action="{{route('deliverys.store')}}" method="POST">
        @csrf
        <label >Numero de licencia
            <br>
            <input type="text" name="licenseNumber" value="{{old('licenseNumber')}}">
        </label>
        <br>
        @error('licenseNumber')
            <span>{{$message}}</span>
        @enderror
        <br><br>
        <button type="submit">crear</button>
    </form>
    
</body>
</html>