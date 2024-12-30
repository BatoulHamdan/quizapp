@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <main class="container mx-auto p-6">
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold">Welcome to Quizziz!</h1>
            <p class="text-lg text-gray-600">Create and participate in interactive quizzes with ease!</p>
        </header>
        <div class="image">
            <img src="{{ asset('images/pic.jpg') }}" alt="Quizziz Image" class="rounded-lg shadow-lg max-w-full">
        </div>
    </main>
@endsection
