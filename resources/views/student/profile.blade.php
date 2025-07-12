<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
        }

        .profile-container {
            max-width: 700px;
            margin: 4rem auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }

        .info {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background-color: #f8f9fa;
            border-left: 5px solid #0d6efd;
        }

        .info strong {
            display: block;
            color: #555;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .action-btn {
            flex: 1;
            text-align: center;
            background-color: #0d6efd;
            color: white;
            padding: 0.8rem;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
        }

        .action-btn:hover {
            background-color: #0b5ed7;
        }

        .logout-btn {
            background-color: #dc3545;
        }

        .logout-btn:hover {
            background-color: #bb2d3b;
        }
    </style>
</head>

<body>

    <div class="profile-container">
        <h1>Profile</h1>

        <div class="info">
            <strong>Name:</strong> {{ Auth::user()->name }}
        </div>

        <div class="info">
            <strong>Email:</strong> {{ Auth::user()->email }}
        </div>

        <div class="actions">
            <a href="{{ route('profile.edit') }}" class="action-btn">Edit Profile</a>

            <form method="POST" action="{{ route('logout') }}" style="flex: 1;">
                @csrf
                <button type="submit" class="action-btn logout-btn" style="width: 100%; border: none;">Log Out</button>
            </form>
        </div>
    </div>

</body>

</html>