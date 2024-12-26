<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;

// Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Quizzes Routes
    Route::resource('quizzes', QuizController::class);

    // Questions Routes
    Route::prefix('quizzes/{quiz}')->group(function () {
        Route::resource('questions', QuestionController::class, ['except' => ['index']]);
    });

    // Explicitly define additional routes for clarity (optional)
    Route::get('quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
});

// Users Routes
Route::resource('users', App\Http\Controllers\UserController::class);

// Results Routes
Route::resource('results', App\Http\Controllers\ResultController::class);

require __DIR__ . '/auth.php';
