<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Quiz;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('quiz')->get();  
        return response()->json($results);
    }

    public function create()
    {
        //
    }

    public function show(Result $result)
    {
        $result->load('quiz');
        return view('quiz.result', compact('result'));
    }

    public function update(Request $request, Result $result)
    {
        $validatedData = $request->validate([
            'idquiz' => 'sometimes|required|integer',
            'name' => 'sometimes|required|string|max:255',
            'result' => 'sometimes|required|numeric',
        ]);

        $result->update($validatedData);

        return response()->json(['message' => 'Result updated successfully!', 'data' => $result], 200);
    }

    public function destroy(Result $result)
    {
        $result->delete();

        return response()->json(['message' => 'Result deleted successfully!'], 200);
    }

    public function score(Request $request, $quizId)
    {
        $request->validate([
            'name' => 'required|string|max:255',  
            'answers' => 'required|array',      
        ]);

        $quiz = Quiz::findOrFail($quizId);
        $questions = $quiz->questions; 
        $answers = $request->input('answers'); 
    
        $score = 0;
        foreach ($questions as $question) {
            if (isset($answers[$question->id]) && $answers[$question->id] == $question->answer) {
                $score++;
            }
        }

        $result = Result::create([
            'idquiz' => $quizId,           
            'name' => $request->input('name'), 
            'result' => $score,           
        ]);

        return redirect()->route('results.show', $result->id)
                        ->with('success', 'Quiz submitted successfully!');
    }

}