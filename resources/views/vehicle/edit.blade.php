<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Vehículo</title>
</head>
<body>
    <h1>Editar Vehículo</h1>
    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Marca:
            <br>
            <input type="text" name="brand" value="{{ old('brand', $vehicle->brand) }}">
        </label>
        <br>
        @error('brand')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Modelo:
            <br>
            <input type="text" name="model" value="{{ old('model', $vehicle->model) }}">
        </label>
        <br>
        @error('model')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Año:
            <br>
            <input type="number" name="year" value="{{ old('year', $vehicle->year) }}">
        </label>
        <br>
        @error('year')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Placa:
            <br>
            <input type="text" name="plate" value="{{ old('plate', $vehicle->plate) }}">
        </label>
        <br>
        @error('plate')
            <span>{{ $message }}</span>
        @enderror
        <br>
        <label>Tipo:
            <br>
            <input type="text" name="type" value="{{ old('type', $vehicle->type) }}">
        </label>
        <br>
        @error('type')
            <span>{{ $message }}</span>
        @enderror
        <br><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
