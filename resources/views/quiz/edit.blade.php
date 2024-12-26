@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Quiz</h2>

            <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $quiz->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('quizzes.index') }}" class="mr-4 bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancel</a>
                    <button type="submit" class="bg-indigo-500 text-white px-6 py-2 rounded shadow hover:bg-indigo-600">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
