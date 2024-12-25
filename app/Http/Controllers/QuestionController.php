<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('quiz')->get();  // Fetch all questions along with their related quiz
        return response()->json($questions);
    }

    /**
     * Show the form for creating a new question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idquiz' => 'required|integer|exists:quizzes,idquiz',   // Validate quiz ID exists
            'question' => 'required|string|max:255',
            'choice_1' => 'required|string|max:255',
            'choice_2' => 'required|string|max:255',
            'choice_3' => 'required|string|max:255',
            'choice_4' => 'required|string|max:255',
            'answer' => 'required|string|max:1',
        ]);

        $question = Question::create($validatedData);

        return response()->json(['message' => 'Question created successfully!', 'data' => $question], 201);
    }

    /**
     * Display the specified question.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return response()->json($question->load('quiz'));  // Load the related quiz and return the question
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'idquiz' => 'sometimes|required|integer|exists:quizzes,idquiz',
            'question' => 'sometimes|required|string|max:255',
            'choice_1' => 'sometimes|required|string|max:255',
            'choice_2' => 'sometimes|required|string|max:255',
            'choice_3' => 'sometimes|required|string|max:255',
            'choice_4' => 'sometimes|required|string|max:255',
            'answer' => 'sometimes|required|string|max:1',
        ]);

        $question->update($validatedData);

        return response()->json(['message' => 'Question updated successfully!', 'data' => $question], 200);
    }

    /**
     * Remove the specified question from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return response()->json(['message' => 'Question deleted successfully!'], 200);
    }
}
