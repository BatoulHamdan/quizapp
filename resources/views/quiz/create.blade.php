@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Create Quiz</h2>

            <form action="{{ route('quizzes.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Quiz Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('title')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700">
                        Create Quiz
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Return to <a href="{{ route('quizzes.index') }}" class="text-indigo-500 hover:text-indigo-700">Quizzes List</a>
                </p>
            </div>
        </div>
    </div>
@endsection
