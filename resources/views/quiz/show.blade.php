@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">{{ $quiz->title }}</h2>

            <p>Total Questions: {{ $quiz->questions->count() }}</p>
            <p>Created At: {{ $quiz->created_at->format('d M Y, H:i') }}</p>

            <a href="{{ route('quizzes.questions.create', $quiz->id) }}" class="w-full bg-indigo-500 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-600 mt-4">Add Question</a>

            <h3 class="mt-6 text-xl font-semibold">Questions:</h3>
            <ul class="list-disc pl-6 space-y-2">
                @foreach($questions as $question)
                    <li>
                        {{ $question->question }}  <!-- Display the question text -->
                        <ul class="list-inside space-y-1">
                            <li>1. {{ $question->choice_1 }}</li>
                            <li>2. {{ $question->choice_2 }}</li>
                            <li>3. {{ $question->choice_3 }}</li>
                            <li>4. {{ $question->choice_4 }}</li>
                        </ul>
                        <p class="text-sm text-gray-500">Answer: {{ $question->answer }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
