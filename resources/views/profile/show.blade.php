@extends('layouts.app')

@section('title', 'Your Profile')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Your Profile</h2>

            <div class="mb-4">
                <p><strong>First Name:</strong> {{ $user->firstname }}</p>
            </div>

            <div class="mb-4">
                <p><strong>Last Name:</strong> {{ $user->lastname }}</p>
            </div>

            <div class="mb-4">
                <p><strong>Username:</strong> {{ $user->username }}</p>
            </div>

            <div class="mb-4">
                <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>

            <div class="flex items-center justify-center">
                <a href="{{ route('profile.edit') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
@endsection
