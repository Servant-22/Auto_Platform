@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Afspraak Gepland</h2>
    @if(isset($response['confirmation_id']))
        <p>Uw afspraak is succesvol gepland. Uw bevestigings-ID is: {{ $response['confirmation_id'] }}</p>
    @else
        <p>Er is een fout opgetreden bij het plannen van uw afspraak.</p>
    @endif
    <a href="{{ url('/grpc/schedule') }}" class="btn btn-primary">Nieuwe Afspraak</a>
</div>
@endsection
