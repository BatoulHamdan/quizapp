<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizziz</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo h2 {
            margin: 0;
        }
        .header__buttons a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            padding: 10px 15px;
            border-radius: 5px;
            background-color: #0056b3;
        }
        .header__buttons a:hover {
            background-color: #004085;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }
        .container h1 {
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 15px;
        }
        ul li p {
            margin: 0;
        }
    </style>
</head>
<body>

    <header class="header">
        <a href="#" class="logo"><h2>Quizziz</h2></a>
        <div class="header__buttons">
            <a href="{{ route('login') }}" class="header__button">Log in</a>
            <a href="{{ route('register') }}" class="header__button">Sign up</a>
        </div>
    </header>

    <div class="container">
        <h1>Welcome to Quizizz</h1>
        <ul>
            <li><p>Create your own quiz</p></li>
            <li><p>Take quizzes and share them with your friends</p></li>
            <li><p>Challenge your friends and see who scores the highest</p></li>
        </ul>
    </div>

</body>
</html>
