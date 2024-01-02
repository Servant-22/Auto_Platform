{{-- resources/views/feedback_thank_you.blade.php --}}
<link rel="stylesheet" href="{{ asset('css/feedback_thank_you.css') }}">
@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Bedankt voor uw feedback!</h1>
        <p>Uw mening is belangrijk voor ons.</p>

        @if(isset($averageScore))
            <p>De huidige gemiddelde score is: {{ $averageScore }}</p>
        @endif
    </div>
@endsection




