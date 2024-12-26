<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Quizziz' }}</title>
    <meta name="description" content="Quizziz - Your platform to create, play, and explore quizzes online.">
    <meta name="author" content="Your Name">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')

    <main class="container mx-auto p-6">
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold">Welcome to Quizziz</h1>
            <p class="text-lg text-gray-600">Create and participate in interactive quizzes with ease!</p>
        </header>

        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>
