{{-- resources/views/user_preferences.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Preferences</h1>
    <form action="{{ url('/user-preferences/' . $userId) }}" method="POST">
        @csrf
        <div>
            <label for="notificationFrequency">Notification Frequency:</label>
            <input type="text" name="notificationFrequency" id="notificationFrequency" value="{{ $preferences['data']['getUserPreferences']['notificationFrequency'] ?? '' }}">
        </div>
        <div>
            <label for="communicationChannel">Communication Channel:</label>
            <input type="text" name="communicationChannel" id="communicationChannel" value="{{ $preferences['data']['getUserPreferences']['communicationChannel'] ?? '' }}">
        </div>
        <button type="submit">Update Preferences</button>
    </form>
</div>
@endsection
