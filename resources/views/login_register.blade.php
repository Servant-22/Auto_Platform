<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login_register.css') }}">
    <title>Login/Register</title>
</head>
<body>
    <div class="container">
        <!-- Display Errors -->
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="login-register-form">
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <label for="loginEmail">Email:</label>
                <input type="email" id="loginEmail" name="email" required>
                <label for="loginPassword">Password:</label>
                <input type="password" id="loginPassword" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="login-register-form">
            <h2>Register</h2>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <label for="registerName">Name:</label>
                <input type="text" id="registerName" name="name" required>
                <label for="registerEmail">Email:</label>
                <input type="email" id="registerEmail" name="email" required>
                <label for="registerPassword">Password:</label>
                <input type="password" id="registerPassword" name="password" required>
                <label for="registerPasswordConfirmation">Confirm Password:</label>
                <input type="password" id="registerPasswordConfirmation" name="password_confirmation" required>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
