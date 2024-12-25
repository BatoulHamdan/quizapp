<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the quizzes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::with('questions')->get();  // Fetch all quizzes with their related questions
        return response()->json($quizzes);
    }

    /**
     * Show the form for creating a new quiz.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created quiz in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
            'total' => 'required|integer',
        ]);

        $quiz = Quiz::create($validatedData);

        return response()->json(['message' => 'Quiz created successfully!', 'data' => $quiz], 201);
    }

    /**
     * Display the specified quiz.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return response()->json($quiz->load('questions'));  // Load related questions and return the quiz
    }

    /**
     * Show the form for editing the specified quiz.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified quiz in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'total' => 'sometimes|required|integer',
        ]);

        $quiz->update($validatedData);

        return response()->json(['message' => 'Quiz updated successfully!', 'data' => $quiz], 200);
    }

    /**
     * Remove the specified quiz from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return response()->json(['message' => 'Quiz deleted successfully!'], 200);
    }
}
