{{-- resources/views/feedback_thank_you.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Bedankt voor uw feedback!</h1>
    <p>Uw mening is belangrijk voor ons.</p>

    @if(isset($averageScore))
        <p>De huidige gemiddelde score is: {{ $averageScore }}</p>
    @endif
@endsection
