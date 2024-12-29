@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">{{ $quiz->title }}</h2>

            <p>Total Questions: {{ $quiz->questions->count() }}</p>
            <p>Created At: {{ optional($quiz->created_at)->format('d M Y, H:i') ?? 'Not available' }}</p>

            <!-- Quiz Link Generator Section -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Quiz Link Generator</h3>
                <div class="space-y-4">
                    <button class="header__button bg-green-500 text-white px-4 py-2 rounded w-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500" 
                            type="button" onclick="generateAndCopyQuizLink()" aria-label="Generate and Copy Quiz Link">
                        Copy Quiz Link
                    </button>
                    <textarea id="quizLink" class="w-full border p-2 rounded hidden" readonly></textarea>
                </div>
            </div>

            @if ($quiz->questions->count() > 0)
                <h3 class="mt-6 text-xl font-semibold">Questions:</h3>
                <ul class="list-disc pl-6 space-y-4">
                    @foreach($quiz->questions as $question)
                        <li class="border p-4 rounded-lg shadow-sm bg-gray-50">
                            <p class="font-medium">{{ $question->question }}</p>
                            <ul class="list-decimal pl-4 mt-2">
                                <li>Choice 1: {{ $question->choice_1 }}</li>
                                <li>Choice 2: {{ $question->choice_2 }}</li>
                                <li>Choice 3: {{ $question->choice_3 }}</li>
                                <li>Choice 4: {{ $question->choice_4 }}</li>
                            </ul>
                            <p class="mt-2 text-green-600 font-semibold">Answer: {{ $question->answer }}</p>
                            <div class="flex space-x-2 mt-4">
                                <a href="{{ route('questions.edit', [$quiz->id, $question->id]) }}" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('questions.destroy', [$quiz->id, $question->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500"
                                            onclick="return confirm('Are you sure you want to delete this question?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="mt-4 text-gray-600">No questions found for this quiz.</p>
            @endif
            <a href="{{ route('questions.create', $quiz->id) }}" 
               class="w-full bg-indigo-500 text-white px-6 py-3 rounded-lg shadow hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 mt-4 inline-block text-center">
                Add Question
            </a>
        </div>
    </div>

    <!-- JavaScript for Quiz Link Generator -->
    <script>
        function generateAndCopyQuizLink() {
            const quizLink = `${window.location.origin}/quiz/{{ $quiz->id }}/solve`;
            navigator.clipboard.writeText(quizLink)
                .then(() => {
                    alert('Quiz link copied to clipboard!');
                })
                .catch(err => {
                    alert('Failed to copy the link. Please try again manually.');
                    console.error('Error copying text:', err);
                });
        }
    </script>
@endsection
