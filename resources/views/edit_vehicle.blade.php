<!DOCTYPE html>
<html>
<head>
    <title>Edit Vehicle</title>
    <!-- Include your stylesheets here -->
</head>
<body>
    <h1>Edit Vehicle</h1>
    <form method="POST" action="{{ route('maintenance.update', $vehicle->id) }}">
        @csrf
        @method('PUT')
        <label for="make">Make:</label>
        <input type="text" id="make" name="make" value="{{ $vehicle->make }}" required><br>
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" value="{{ $vehicle->model }}" required><br>
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" value="{{ $vehicle->year }}" required><br>
        <input type="submit" value="Update Vehicle">
    </form>
</body>
</html>
