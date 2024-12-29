<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the questions for a specific quiz.
     *
     * @param  int  $quizId
     * @return \Illuminate\Http\Response
     */
    public function index($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $questions = $quiz->questions; // Access related questions
        return view('questions.index', compact('questions', 'quiz'));
    }

    /**
     * Show the form for creating a new question.
     *
     * @param  int  $quizId
     * @return \Illuminate\Http\Response
     */
    public function create($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        return view('question.create', compact('quiz'));
    }

    /**
     * Store a newly created question in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $quizId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $quizId)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'choice_1' => 'required|string|max:255',
            'choice_2' => 'required|string|max:255',
            'choice_3' => 'required|string|max:255',
            'choice_4' => 'required|string|max:255',
            'answer' => 'required|integer|in:1,2,3,4', // 1-4 for choices
        ]);

        $quiz = Quiz::findOrFail($quizId);

        // Save the correct choice value in the `answer` field
        $data = $request->all();
        $data['answer'] = $request->input("choice_{$request->answer}");

        $quiz->questions()->create($data);

        return redirect()->route('quizzes.index', $quizId)
                        ->with('success', 'Question added successfully.');
    }

    /**
     * Display the specified question.
     *
     * @param  int  $quizId
     * @param  int  $questionId
     * @return \Illuminate\Http\Response
     */
    public function show($quizId, $questionId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $question = $quiz->questions()->findOrFail($questionId);

        return view('questions.show', compact('quiz', 'question'));
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param  int  $quizId
     * @param  int  $questionId
     * @return \Illuminate\Http\Response
     */
    public function edit($quizId, $questionId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $question = $quiz->questions()->findOrFail($questionId);

        return view('question.edit', compact('quiz', 'question'));
    }

    /**
     * Update the specified question in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $quizId
     * @param  int  $questionId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $quizId, $questionId)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'choice_1' => 'required|string|max:255',
            'choice_2' => 'required|string|max:255',
            'choice_3' => 'required|string|max:255',
            'choice_4' => 'required|string|max:255',
            'answer' => 'required|integer|in:1,2,3,4',
        ]);

        $quiz = Quiz::findOrFail($quizId);
        $question = $quiz->questions()->findOrFail($questionId);

        $data = $request->all();
        $data['answer'] = $request->input("choice_{$request->answer}");

        $question->update($data);

        return redirect()->route('quizzes.show', $quizId)
                        ->with('success', 'Question updated successfully.');
    }


    /**
     * Remove the specified question from the database.
     *
     * @param  int  $quizId
     * @param  int  $questionId
     * @return \Illuminate\Http\Response
     */
    public function destroy($quizId, $questionId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $question = $quiz->questions()->findOrFail($questionId);

        $question->delete();

        return redirect()->route('quizzes.show', $quizId)
                         ->with('success', 'Question deleted successfully.');
    }
}
