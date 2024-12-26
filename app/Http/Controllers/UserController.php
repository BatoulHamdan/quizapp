<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage using prepared statements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Use prepared statement to insert data
        DB::insert(
            'INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)',
            [
                $validatedData['firstname'],
                $validatedData['lastname'],
                $validatedData['username'],
                $validatedData['email'],
                Hash::make($validatedData['password']), 
            ]
        );

        return response()->json(['message' => 'User created successfully!'], 201);
    }

    /**
     * Update the specified user using prepared statements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validate request
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'username' => 'sometimes|required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Use prepared statement to update user
        DB::update(
            'UPDATE users SET name = ?, username = ?, email = ?, password = ? WHERE id = ?',
            [
                $validatedData['name'] ?? $user->name,
                $validatedData['username'] ?? $user->username,
                $validatedData['email'] ?? $user->email,
                isset($validatedData['password']) ? Hash::make($validatedData['password']) : $user->password,
                $user->id,
            ]
        );

        return response()->json(['message' => 'User updated successfully!'], 200);
    }

    /**
     * Remove the specified user from storage using prepared statements.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::delete('DELETE FROM users WHERE id = ?', [$user->id]);

        return response()->json(['message' => 'User deleted successfully!'], 200);
    }
}

