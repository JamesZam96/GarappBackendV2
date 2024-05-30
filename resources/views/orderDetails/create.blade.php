<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina para grear un people</title>
</head>
<body>
    <h1>Aqui podras crear un orden</h1>
    <form action="{{route('orders.store')}}" method="POST">
        @csrf
        <label >Cantidad
            <br>
            <input type="text" name="quantity" value="{{old('quantity')}}">
        </label>
        <br>
        @error('quantity')
            <span>{{$message}}</span>
        @enderror
        <label >Precio unitario
            <br>
            <input type="text" name="unitprice" value="{{old('unitprice')}}">
        </label>
        <br>
        @error('unitprice')
        <span>{{$message}}</span>
        @enderror
        <label >subtotal
            <br>
            <input type="text" name="subtotal" value="{{old('subtotal')}}">
        </label>
        @error('subtotal')
            <span>{{$message}}</span>
        @enderror
        <br><br>
        <button type="submit">crear</button>
    </form>
    
</body>
</html>