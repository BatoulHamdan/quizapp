@extends('layouts.app')

@section('content')
    <h1>{{ $quiz->title }}</h1>

    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST">
        @csrf

        @foreach ($quiz->questions as $question)
            <div>
                <h3>{{ $question->text }}</h3>
                @foreach ($question->options as $option)
                    <label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                        {{ $option->text }}
                    </label>
                @endforeach
            </div>
        @endforeach

        <button type="submit">Submit Quiz</button>
    </form>
@endsection
