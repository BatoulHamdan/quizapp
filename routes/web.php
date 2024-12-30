<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResultController;
use App\Http\Middleware\QuizSolveMiddleware;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Middleware for authenticated users
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Quizzes Routes
    Route::resource('quizzes', QuizController::class);
    Route::get('quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
    Route::get('quizzes/{quizId}/results', [ResultController::class, 'index'])->name('quizzes.results');

    // Questions Routes
    Route::prefix('quizzes/{quiz}')->group(function () {
        Route::resource('questions', QuestionController::class, ['except' => ['index']]);
    });
    
});

// Quiz-Solving Routes
Route::get('quiz/{quiz}/solve', [QuizController::class, 'solve'])
    ->name('quizzes.solve');

Route::post('quiz/{quiz}/submit', [ResultController::class, 'score'])
    ->name('results.score');

// Users Routes
Route::resource('users', UserController::class);

// Results Routes
Route::get('results/{result}', [ResultController::class, 'show'])->name('results.show');

require __DIR__ . '/auth.php';
