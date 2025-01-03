<nav class="navbar">
    <div class="container">
        <a href="{{ url('/dashboard') }}" class="logo">Quizziz</a>
        @auth
        <ul class="nav-links">
                <li><a href="{{ route('quizzes.create') }}">Create Quiz</a></li>
                <li><a href="{{ route('quizzes.index') }}">Quizzes</a></li>
                <li><a href="{{ route('profile.show') }}">Profile</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button">Logout</button>
                    </form>
                </li>
            @else
            <a href="{{ url('/') }}" class="logo">MyApp</a>
            <ul class="nav-links">
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
        </ul>
        <button class="menu-toggle" id="menu-toggle">☰</button>
    </div>
</nav>
