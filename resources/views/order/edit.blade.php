<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Orden</title>
</head>
<body>
    <h1>Editar Orden</h1>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PATCH')
        
        <label>Fecha:
            <br>
            <input type="date" name="date" value="{{ old('date', $order->date) }}">
        </label>
        <br>
        @error('date')
            <span>{{ $message }}</span>
            <br>
        @enderror

        <label>Estado:
            <br>
            <input type="text" name="state" value="{{ old('state', $order->state) }}">
        </label>
        <br>
        @error('state')
            <span>{{ $message }}</span>
            <br>
        @enderror

        <br><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
