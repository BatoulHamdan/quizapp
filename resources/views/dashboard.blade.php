@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Welcome Back, {{ request('username') }}</h1>

            <button onclick="window.location.href='{{ route('quizzes.create') }}'" class="w-full bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700">
                Create Quiz
            </button>
            <br><br>
            <button onclick="window.location.href='{{ route('quizzes.index') }}'" class="w-full bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700">
                View Quizzes
            </button>

        </div>
    </div>
@endsection
