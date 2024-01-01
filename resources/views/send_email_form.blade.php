{{-- resources/views/send_email_form.blade.php --}}

@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('send-email') }}">
        @csrf
        <div>
            <label for="email">E-mailadres:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="message">Bericht:</label>
            <textarea name="message" id="message" required></textarea>
        </div>

        <button type="submit">Verstuur E-mail</button>
    </form>
@endsection
