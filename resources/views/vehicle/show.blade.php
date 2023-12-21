@extends('layouts.app')

@section('content')
    <h1>Vehicle Details</h1>
    @if($vehicle)
        <p>VIN: {{ $vehicle->vin }}</p>
        <p>Make: {{ $vehicle->make }}</p>
        <p>Model: {{ $vehicle->model }}</p>
        <!-- Voeg andere velden toe zoals nodig -->
    @else
        <p>Vehicle not found.</p>
    @endif
@endsection
