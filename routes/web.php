<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProfileController;
    
    // Home route
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::middleware('auth')->group(function () {
        Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    });
    
    // Users Routes
    Route::resource('users', App\Http\Controllers\UserController::class);
    
    // Questions Routes
    Route::resource('questions', App\Http\Controllers\QuestionController::class);
    
    // Quizzes Routes
    Route::resource('quizzes', App\Http\Controllers\QuizController::class);
    
    // Results Routes
    Route::resource('results', App\Http\Controllers\ResultController::class);

    require __DIR__ . '/auth.php';
    