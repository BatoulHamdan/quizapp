@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Question</h2>

            <form method="POST" action="{{ route('questions.update', [$quiz->id, $question->id]) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <label class="block">
                    <span class="text-gray-700">Question</span>
                    <input type="text" name="question" value="{{ old('question', $question->question) }}" class="mt-1 block w-full border-gray-300 rounded">
                    @error('question')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block">
                    <span class="text-gray-700">Choice 1</span>
                    <input type="text" name="choice_1" value="{{ old('choice_1', $question->choice_1) }}" class="mt-1 block w-full border-gray-300 rounded">
                    @error('choice_1')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block">
                    <span class="text-gray-700">Choice 2</span>
                    <input type="text" name="choice_2" value="{{ old('choice_2', $question->choice_2) }}" class="mt-1 block w-full border-gray-300 rounded">
                    @error('choice_2')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block">
                    <span class="text-gray-700">Choice 3</span>
                    <input type="text" name="choice_3" value="{{ old('choice_3', $question->choice_3) }}" class="mt-1 block w-full border-gray-300 rounded">
                    @error('choice_3')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block">
                    <span class="text-gray-700">Choice 4</span>
                    <input type="text" name="choice_4" value="{{ old('choice_4', $question->choice_4) }}" class="mt-1 block w-full border-gray-300 rounded">
                    @error('choice_4')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>

                <label class="block">
                    <span class="text-gray-700">Answer</span>
                    <input type="text" name="answer" value="{{ old('answer', $question->answer) }}" class="mt-1 block w-full border-gray-300 rounded">
                    @error('answer')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </label>

                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Save Changes</button>
                    <a href="{{ route('quizzes.show', $quiz->id) }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
