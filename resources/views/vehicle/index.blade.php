@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Voertuig Informatie</h1>
    <form method="POST" action="{{ url('/vehicle') }}">
        @csrf
        <div class="form-group">
            <label for="vin">VIN Nummer:</label>
            <input type="text" class="form-control" id="vin" name="vin" required>
        </div>
        <button type="submit" class="btn btn-primary">Zoek</button>
    </form>

    @if(isset($vehicleDetails))
        <div class="vehicle-details">
            <h2>Details:</h2>
            <p>Merk: {{ $vehicleDetails->Make ?? 'Niet beschikbaar' }}</p>
            <p>Model: {{ $vehicleDetails->Model ?? 'Niet beschikbaar' }}</p>
            <p>Bouwjaar: {{ $vehicleDetails->Year ?? 'Niet beschikbaar' }}</p>
            {{-- Voeg meer velden toe zoals nodig --}}
        </div>
    @endif
</div>
@endsection
