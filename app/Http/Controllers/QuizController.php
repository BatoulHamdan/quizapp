<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Store a newly created quiz in storage using prepared statements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        return view('quiz.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {
            // Use prepared statement to insert data
            DB::insert(
                'INSERT INTO quizzes (user_id, title, created_at, updated_at) VALUES (?, ?, NOW(), NOW())',
                [
                    Auth::id(), // Set user_id to the currently authenticated user's ID
                    $validatedData['title'],
                ]
            );

            return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully!');
        } catch (\Exception $e) {
            // Handle any potential errors
            return redirect()->back()->with('error', 'An error occurred while creating the quiz.');
        }
    }

    /**
     * Update the specified quiz using prepared statements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */

     public function edit($quizId)
     {
        $quiz = Quiz::findOrFail($quizId);
         
        return view('quiz.edit', compact('quiz'));
     }

    public function update(Request $request, Quiz $quiz)
    {
        // Validate request
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
        ]);

        // Use prepared statement to update quiz
        DB::update(
            'UPDATE quizzes SET title = ?, updated_at = NOW() WHERE id = ?',
            [
                $validatedData['title'] ?? $quiz->title,
                $quiz->id,
            ]
        );

        return redirect()->route('quizzes.show', $quiz)->with('success', 'Quiz updated successfully!');
    }

    /**
     * Remove the specified quiz from storage using prepared statements.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        DB::delete('DELETE FROM quizzes WHERE id = ?', [$quiz->id]);

        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully!');
    }

    public function show(Quiz $quiz)
    {
        // Load questions related to the quiz
        $quiz->load('questions');

        // Pass the quiz and its questions to the view
        return view('quiz.show', [
            'quiz' => $quiz,
            'questions' => $quiz->questions, // Pass related questions explicitly
        ]);
    }

    public function index()
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        $quizzes = Quiz::where('user_id', $userId)->get(); 

        return view('quiz.index', compact('quizzes')); 
    }

    /**
     * Display the quiz solving page.
     *
     * @param  int  $quizId
     * @return \Illuminate\Http\Response
     */
    public function solve($quizId)
    {
        $quiz = Quiz::with('questions')->findOrFail($quizId);  
        
        return view('quiz.solve', compact('quiz'));
    }

}