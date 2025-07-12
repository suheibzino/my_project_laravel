<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #222;
        }

        .login-wrapper {
            background: #f7f7f7;
            padding: 40px 50px;
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2rem;
            color: blue;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 18px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 1rem;
            outline: none;
            background: #fff;
            color: #222;
            transition: border-color 0.3s ease;
        }

        input::placeholder {
            color: #aaa;
        }

        input:focus {
            border-color: #4a90e2;
        }

        .error-text {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: -15px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 12px;
            background: #4a90e2;
            font-size: 1.1rem;
            font-weight: 700;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #357ABD;
        }

        .links {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }

        .links a {
            color: #4a90e2;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #2c5ca9;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <main class="login-wrapper" role="main" aria-label="Login">

        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                placeholder="example@email.com" aria-describedby="email-error" />
            @error('email')
                <div id="email-error" class="error-text">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required placeholder="••••••••"
                aria-describedby="password-error" />
            @error('password')
                <div id="password-error" class="error-text">{{ $message }}</div>
            @enderror

            <button type="submit" aria-label="Login">Login</button>
        </form>

        <div class="links" aria-label="Register Links">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div>

    </main>

</body>

</html>