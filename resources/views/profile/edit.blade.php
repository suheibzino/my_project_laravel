<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Profile</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            color: #333;
        }

        .profile-edit-container {
            background: #fff;
            margin: 40px 20px;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .profile-edit-container h1 {
            margin-bottom: 25px;
            font-weight: 700;
            font-size: 1.8rem;
            color: #0d6efd;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 12px 15px;
            font-size: 1rem;
            border: 1.8px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s ease;
            outline-offset: 2px;
            outline-color: transparent;
            width: 100%;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #0d6efd;
            outline-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.3);
        }

        .btn-submit {
            background-color: #0d6efd;
            border: none;
            color: white;
            padding: 14px 0;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.25s ease;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #0846c6;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        /* Responsive */
        @media (max-width: 520px) {
            .profile-edit-container {
                margin: 20px 10px;
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="profile-edit-container">
        <h1>Edit Profile</h1>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required />
            </div>

            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input id="current_password" type="password" name="current_password"
                    placeholder="Enter current password" />
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input id="password" type="password" name="password" placeholder="Enter new password" />
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    placeholder="Confirm new password" />
            </div>

            <button type="submit" class="btn-submit">Save Changes</button>
        </form>
    </div>

</body>

</html>