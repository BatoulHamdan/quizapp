@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Add Question</h2>

            <form action="{{ route('questions.store', $quiz->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="question" class="block text-sm font-medium text-gray-700">Question</label>
                    <input type="text" id="question" name="question" value="{{ old('question') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('question')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="choice_1" class="block text-sm font-medium text-gray-700">Choice 1</label>
                    <input type="text" id="choice_1" name="choice_1" value="{{ old('choice_1') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('choice_1')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="choice_2" class="block text-sm font-medium text-gray-700">Choice 2</label>
                    <input type="text" id="choice_2" name="choice_2" value="{{ old('choice_2') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('choice_2')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="choice_3" class="block text-sm font-medium text-gray-700">Choice 3</label>
                    <input type="text" id="choice_3" name="choice_3" value="{{ old('choice_3') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('choice_3')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="choice_4" class="block text-sm font-medium text-gray-700">Choice 4</label>
                    <input type="text" id="choice_4" name="choice_4" value="{{ old('choice_4') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('choice_4')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="answer" class="block text-sm font-medium text-gray-700">Answer</label>
                    <input type="text" id="answer" name="answer" value="{{ old('answer') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('answer')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700">
                        Add Question
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Return to <a href="{{ route('quizzes.show', $quiz->id) }}" class="text-indigo-500 hover:text-indigo-700">Quiz Details</a>
                </p>
            </div>
        </div>
    </div>
@endsection
