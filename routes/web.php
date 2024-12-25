<?php
    use Illuminate\Support\Facades\Route;

    // Home route
    Route::get('/', function () {
        return view('welcome');
    });

    // Users Routes
    Route::resource('users', 'UserController');

    // Questions Routes
    Route::resource('questions', 'QuestionController');

    // Quizzes Routes
    Route::resource('quizzes', 'QuizController');

    // Results Routes
    Route::resource('results', 'ResultController');
