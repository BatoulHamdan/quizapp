@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Results for Quiz: {{ $quiz->title }}</h2>

            @if($results->isEmpty())
                <p class="text-gray-600">No results found for this quiz.</p>
            @else
                <div class="mt-6">
                    <p class="font-bold">Total Results: {{ $results->count() }}</p>

                    @php
                        $totalQuestions = $quiz->questions->count();
                        $passingThreshold = $totalQuestions * 0.5; // 50% of the total questions
                        $passingResults = $results->filter(function ($result) use ($passingThreshold) {
                            return $result->result >= $passingThreshold;
                        });
                        $percentagePassing = ($passingResults->count() / $results->count()) * 100;
                    @endphp

                    <p class="text-green-500">Passing Percentage: {{ number_format($percentagePassing, 2) }}%</p>
                </div>
                
                <ul>
                    @foreach($results as $result)
                        <li class="border-b px-4 py-2 flex justify-between">
                            <span class="text-left">{{ $result->name }}</span>
                            <span class="text-right">{{ $result->result }} / {{ $result->quiz->questions->count() }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
