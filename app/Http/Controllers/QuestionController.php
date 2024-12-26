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
     * @param  Quiz  $quiz
     * @return \Illuminate\Http\Response
     */

    public function create(Quiz $quiz)
    {
        return view('question.create', compact('quiz'));
    }


    public function index(Quiz $quiz)
    {
        // Fetch all questions with their related quizzes
        $questions = Question::with('quiz')->where('idquiz', $quiz->id)->get();
        return response()->json($questions);
    }

    /**
     * Show the form for creating a new question.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([  
            'question' => 'required|string|max:255',
            'choice_1' => 'required|string|max:255',
            'choice_2' => 'required|string|max:255',
            'choice_3' => 'required|string|max:255',
            'choice_4' => 'required|string|max:255',
            'answer' => 'required|string|max:1',
        ]);

        // Insert question into the questions table
        $question = new Question([
            'idquiz' => $quiz->id,   
            'question' => $validatedData['question'],
            'choice_1' => $validatedData['choice_1'],
            'choice_2' => $validatedData['choice_2'],
            'choice_3' => $validatedData['choice_3'],
            'choice_4' => $validatedData['choice_4'],
            'answer' => $validatedData['answer']
        ]);

        $question->save();  

        return redirect()->route('quizzes.show', $quiz->id)->with('success', 'Question added successfully!');
    }

    /**
     * Display the specified question.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        // Load the related quiz and return the question
        return response()->json($question->load('quiz'));
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        // No implementation needed for now
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
            'idquiz' => 'sometimes|required|integer|exists:quizzes,id',
            'question' => 'sometimes|required|string|max:255',
            'choice_1' => 'sometimes|required|string|max:255',
            'choice_2' => 'sometimes|required|string|max:255',
            'choice_3' => 'sometimes|required|string|max:255',
            'choice_4' => 'sometimes|required|string|max:255',
            'answer' => 'sometimes|required|string|max:1',
        ]);

        // Update the question with validated data
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
