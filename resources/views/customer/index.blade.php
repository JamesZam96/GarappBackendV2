<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a la página principal de clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="{{ route('customers.create') }}">Crear cliente</a>
    <ul>
        @foreach ($customers as $customer)
            <li><a href="{{ route('customers.show', $customer->id) }}">{{ $customer->id }}</a></li>
        @endforeach
    </ul>
    {{ $customers->links() }}
</body>
</html>
