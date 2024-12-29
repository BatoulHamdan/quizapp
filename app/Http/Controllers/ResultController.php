<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Quiz;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the results.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::with('quiz')->get();  // Load related quiz data
        return response()->json($results);
    }

    /**
     * Show the form for creating a new result.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified result.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        // Load the quiz relationship
        $result->load('quiz');

        return view('quiz.result', compact('result'));
    }

    /**
     * Update the specified result in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified result from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->delete();

        return response()->json(['message' => 'Result deleted successfully!'], 200);
    }

    public function score(Request $request, $quizId)
{
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',  // User's name
        'answers' => 'required|array',       // Answers submitted as an associative array
    ]);

    // Retrieve the quiz and associated questions
    $quiz = Quiz::findOrFail($quizId);
    $questions = $quiz->questions; // Assuming `questions` is a relationship in the `Quiz` model
    $answers = $request->input('answers'); // Submitted answers: question_id => selected_option

    // Initialize the score
    $score = 0;

    // Loop through each question to calculate the score
    foreach ($questions as $question) {
        // Check if the submitted answer matches the correct answer
        if (isset($answers[$question->id]) && $answers[$question->id] == $question->answer) {
            $score++;
        }
    }

    // Save the result to the database
    $result = Result::create([
        'idquiz' => $quizId,           // Quiz ID
        'name' => $request->input('name'), // User's name
        'result' => $score,            // Calculated score
    ]);

    // Redirect to a result view or return JSON
    return redirect()->route('results.show', $result->id)
                     ->with('success', 'Quiz submitted successfully!');
}

}