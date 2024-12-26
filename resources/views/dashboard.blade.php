@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <form method="POST" action="" class="form">
        @csrf
        <h1>Welcome Back, {{ request('username') }}</h1>
        <button type="submit" name="create" formaction="{{ url('quizcreate?username=' . request('username')) }}" class="but">Create Quiz</button>
        <br><br>
        <button type="submit" name="show" formaction="{{ url('quizview?username=' . request('username')) }}" class="but">View Quizzes</button>
    </form>
</div>
@endsection
