<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Details</title>
    <!-- Voeg hier je stylesheets toe -->
</head>
<body>

@if(isset($vehicle->GetVehicleDataResult))
    <div>
        <h3>Vehicle Details</h3>
        <p>Make: {{ $vehicle->GetVehicleDataResult->Make }}</p>
        <p>Model: {{ $vehicle->GetVehicleDataResult->Model }}</p>
        <p>Model Year: {{ $vehicle->GetVehicleDataResult->ModelYear }}</p>
        <p>Body Class: {{ $vehicle->GetVehicleDataResult->BodyClass }}</p>
        <p>Vehicle Type: {{ $vehicle->GetVehicleDataResult->VehicleType }}</p>
    </div>
@else
    <p>No vehicle data found.</p>
@endif

</body>
</html>
