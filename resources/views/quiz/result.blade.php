@extends('layouts.guest')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Quiz Result</h2>

            <div class="text-center">
                @if($result)
                    <p class="text-lg mb-4">Quiz Name: <strong>{{ $result->quiz->title ?? 'Unknown Quiz' }}</strong></p>
                    <p class="text-lg mb-4">Participant Name: <strong>{{ $result->name }}</strong></p>
                    <p class="text-lg mb-4">Your Score: <strong>{{ $result->result }}</strong> / <strong>{{ $result->quiz->questions->count() }}</strong></p>

                    @php
                        $totalQuestions = $result->quiz->questions->count();
                        $score = $result->result;
                        $passingScore = ceil($totalQuestions / 2); 
                    @endphp

                    @if($score >= $passingScore)
                        <p class="text-green-500">Congratulations!</p>
                    @else
                        <p class="text-red-500">Hard Luck! Better luck next time.</p>
                    @endif
                @else
                    <p class="text-red-500">No result found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
