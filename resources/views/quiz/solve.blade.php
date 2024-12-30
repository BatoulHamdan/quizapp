@extends('layouts.guest')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">{{ $quiz->title }}</h2>

            <form action="{{ route('results.score', $quiz->id) }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @foreach ($quiz->questions as $question)
                    <div class="mb-6">
                        <h3 class="text-lg font-medium">{{ $question->question }}</h3>
                        <div class="space-y-4">
                            <div>
                                <input type="radio" id="choice_1_{{ $question->id }}" name="answers[{{ $question->id }}]" value="{{ $question->choice_1 }}" required>
                                <label for="choice_1_{{ $question->id }}" class="ml-2">{{ $question->choice_1 }}</label>
                            </div>
                            <div>
                                <input type="radio" id="choice_2_{{ $question->id }}" name="answers[{{ $question->id }}]" value="{{ $question->choice_2 }}" required>
                                <label for="choice_2_{{ $question->id }}" class="ml-2">{{ $question->choice_2 }}</label>
                            </div>
                            <div>
                                <input type="radio" id="choice_3_{{ $question->id }}" name="answers[{{ $question->id }}]" value="{{ $question->choice_3 }}" required>
                                <label for="choice_3_{{ $question->id }}" class="ml-2">{{ $question->choice_3 }}</label>
                            </div>
                            <div>
                                <input type="radio" id="choice_4_{{ $question->id }}" name="answers[{{ $question->id }}]" value="{{ $question->choice_4 }}" required>
                                <label for="choice_4_{{ $question->id }}" class="ml-2">{{ $question->choice_4 }}</label>
                            </div>
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="w-full bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 focus:outline-none">
                    Submit Quiz
                </button>
            </form>
        </div>
    </div>
@endsection
