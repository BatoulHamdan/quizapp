<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictAccessToQuiz
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is solving a quiz
        if (session('solving_quiz') !== true) {
            // Redirect to a "restricted access" page or home page
            return redirect('/restricted-access')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
