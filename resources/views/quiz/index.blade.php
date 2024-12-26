@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Your Quizzes</h2>

            @if($quizzes->isEmpty())
                <p class="text-center text-gray-600">No quizzes found.</p>
            @else
                <ul>
                    @foreach($quizzes as $quiz)
                        <li class="mb-4">
                            <div class="border-b border-gray-300 pb-4 flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-semibold">{{ $quiz->title }}</h3>
                                    <p>Total Questions: {{ $quiz->questions->count() }}</p>
                                </div>
                                <div class="flex space-x-4">
                                    <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this quiz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
            <button onclick="window.location.href='{{ route('quizzes.create') }}'" class="w-full bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700">
                Create Quiz
            </button>
        </div>
    </div>
@endsection
