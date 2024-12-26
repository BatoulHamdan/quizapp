@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Welcome Back, {{ request('username') }}</h1>

            <div class="flex space-x-4">
                <form method="POST" action="" class="w-full">
                    @csrf
                    <button type="submit" name="create" formaction="{{ url('quizcreate?username=' . request('username')) }}" class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-700">
                        Create Quiz
                    </button>
                </form>
                <form method="POST" action="" class="w-full">
                    @csrf
                    <button type="submit" name="show" formaction="{{ url('quizview?username=' . request('username')) }}" class="w-full bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700">
                        View Quizzes
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
