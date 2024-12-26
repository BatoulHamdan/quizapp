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
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Quizzes Routes
    Route::resource('quizzes', QuizController::class);
    Route::get('quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');

    // Questions Routes
    Route::resource('quizzes.questions', QuestionController::class)->shallow();

});

// Users Routes
Route::resource('users', App\Http\Controllers\UserController::class);

    
// Results Routes
Route::resource('results', App\Http\Controllers\ResultController::class);

require __DIR__ . '/auth.php';
