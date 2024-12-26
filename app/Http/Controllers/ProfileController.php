<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();  // Get authenticated user
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();  // Get authenticated user
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();  // Get authenticated user
        $user->update($request->all());
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}

