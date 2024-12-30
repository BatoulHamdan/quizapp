<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Quizziz' }}</title>
    <link rel="icon" href="{{ asset('images/quizziz.jpg') }}" type="image/jpg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>