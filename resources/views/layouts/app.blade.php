{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Name - @yield('title')</title>
    {{-- Voeg hier uw CSS-links toe --}}
</head>
<body>
    <header>
        {{-- Uw header content --}}
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        {{-- Uw footer content --}}
    </footer>

    {{-- Voeg hier uw JavaScript-bestanden toe --}}
</body>
</html>
