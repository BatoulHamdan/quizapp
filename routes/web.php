<?php
    use Illuminate\Support\Facades\Route;

    // Home route
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    
    // Users Routes
    Route::resource('users', App\Http\Controllers\UserController::class);
    
    // Questions Routes
    Route::resource('questions', App\Http\Controllers\QuestionController::class);
    
    // Quizzes Routes
    Route::resource('quizzes', App\Http\Controllers\QuizController::class);
    
    // Results Routes
    Route::resource('results', App\Http\Controllers\ResultController::class);

    require __DIR__ . '/auth.php';
    