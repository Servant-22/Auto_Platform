
<!DOCTYPE html>
<html>
<head>
    <title>Edit Vehicle</title>
    <link rel="stylesheet" href="{{ asset('css/edit_vehicle.css') }}">
</head>
<body>
    <div class="card">
        <h1>Edit Vehicle</h1>
        <form method="POST" action="{{ route('maintenance.update', $vehicle->id) }}">
            @csrf
            @method('PUT')
            <div class="form-field">
                <label for="make">Make:</label>
                <input type="text" id="make" name="make" value="{{ $vehicle->make }}" required>
            </div>
            <div class="form-field">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" value="{{ $vehicle->model }}" required>
            </div>
            <div class="form-field">
                <label for="year">Year:</label>
                <input type="number" id="year" name="year" value="{{ $vehicle->year }}" required>
            </div>
            <input type="submit" value="Update Vehicle">
        </form>
    </div>
</body>
</html>

