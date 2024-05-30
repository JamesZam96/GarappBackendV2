<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Crear Cliente</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <label for="">Selecciona la persona</label>
        <select name="people_id" id="">
            <option value="" hidden>Seleccione</option>
            @foreach ($people as $people)
                <option value="{{$people->id}}">{{$people->id}}-{{$people->name}}</option>
            @endforeach 
        </select>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
