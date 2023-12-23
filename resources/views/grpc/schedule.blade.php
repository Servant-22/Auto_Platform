@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Plan een Onderhoudsafspraak</h2>
    <form method="POST" action="{{ url('/grpc/schedule') }}">
        @csrf
        <div class="form-group">
            <label for="user_id">Gebruikers-ID:</label>
            <input type="text" class="form-control" id="user_id" name="user_id" required>
        </div>
        <div class="form-group">
            <label for="task_description">Taakbeschrijving:</label>
            <textarea class="form-control" id="task_description" name="task_description" required></textarea>
        </div>
        <div class="form-group">
            <label for="preferred_time">Voorkeurstijd:</label>
            <input type="datetime-local" class="form-control" id="preferred_time" name="preferred_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Plan Afspraak</button>
    </form>
</div>
@endsection
