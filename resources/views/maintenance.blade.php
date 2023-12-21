<!DOCTYPE html>
<html>
<head>
    <title>Maintenance Reminder Service</title>
    <link rel="stylesheet" href="{{ asset('css/maintenance.css') }}">
</head>
<body>
    <header>
        <h1>Maintenance Reminder Service</h1>
    </header>
    <main>
        <section>
            <h2>Add a New Vehicle</h2>
            <form id="vehicleForm" method="POST" action="{{ route('maintenance.store') }}">
                @csrf
                <label for="make">Make:</label>
                <input type="text" id="make" name="make" required><br>
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" required><br>
                <label for="year">Year:</label>
                <input type="number" id="year" name="year" required><br>
                <input type="submit" value="Add Vehicle">
            </form>
        </section>
        <section>
            <h2>Vehicles</h2>
            <ul id="vehicleList">
                @foreach($vehicles as $vehicle)
                <li>
                    {{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->year }})
                    <button onclick="getVehicleDetails('{{ $vehicle->id }}')">Get Details</button>
                    <a href="{{ route('maintenance.edit', $vehicle->id) }}">Edit</a>
                    <form method="POST" action="{{ route('maintenance.destroy', $vehicle->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Maintenance Reminder Service</p>
    </footer>

    <!-- Modal of Sectie voor Voertuigdetails -->
    <div id="vehicleDetailsModal" style="display:none;">
        <!-- Voertuigdetails worden hier weergegeven -->
    </div>

    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
    <script>
function getVehicleDetails(vehicleId) {
    fetch('/api/get-vehicle-details/' + vehicleId)
        .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
        })
        .then(data => {
            document.getElementById('vehicleDetailsModal').innerHTML = data.details;
            document.getElementById('vehicleDetailsModal').style.display = 'block';
        })
    .catch(error => console.error('Error:', error));
    }
    </script>
</body>
</html>
