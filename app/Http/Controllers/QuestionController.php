<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $questions = $quiz->questions; // Access related questions
        return view('questions.index', compact('questions', 'quiz'));
    }

    public function create($quizId)
    {
        $quiz = Quiz::findOrFail($quizId);
        return view('question.create', compact('quiz'));
    }

    public function store(Request $request, $quizId)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'choice_1' => 'required|string|max:255',
            'choice_2' => 'required|string|max:255',
            'choice_3' => 'required|string|max:255',
            'choice_4' => 'required|string|max:255',
            'answer' => 'required|string|max:255', 
        ]);

        $quiz = Quiz::findOrFail($quizId);

        $data = $request->all();
        $data['answer'] = $request->input("choice_{$request->answer}");

        $quiz->questions()->create($data);

        return redirect()->route('quizzes.show', $quizId)
                        ->with('success', 'Question added successfully.');
    }

    public function show($quizId, $questionId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $question = $quiz->questions()->findOrFail($questionId);

        return view('questions.show', compact('quiz', 'question'));
    }

    public function edit($quizId, $questionId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $question = $quiz->questions()->findOrFail($questionId);

        return view('question.edit', compact('quiz', 'question'));
    }

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

    public function destroy($quizId, $questionId)
    {
        $quiz = Quiz::findOrFail($quizId);
        $question = $quiz->questions()->findOrFail($questionId);

        $question->delete();

        return redirect()->route('quizzes.show', $quizId)
                         ->with('success', 'Question deleted successfully.');
    }
}
