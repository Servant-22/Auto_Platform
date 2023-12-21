@if(isset($vehicle))
    <div>
        <h3>Vehicle Details</h3>
        <p>Make: {{ $vehicle->Make }}</p>
        <p>Model: {{ $vehicle->Model }}</p>
        <p>Model Year: {{ $vehicle->ModelYear }}</p>
        <p>Body Class: {{ $vehicle->BodyClass }}</p>
        <p>Vehicle Type: {{ $vehicle->VehicleType }}</p>
    </div>
@else
    <p>No vehicle data found.</p>
@endif
