<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Enrollment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 30px;
            color: #333;
        }

        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        label.checkbox-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
            margin-bottom: 20px;
            user-select: none;
        }

        input[type="checkbox"] {
            width: auto;
            margin: 0;
        }

        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <h2>Create Enrollment</h2>
    <form method="POST" action="{{ route('enrollments.store') }}">
        @csrf

        <select name="user_id" required>
            <option value="" disabled selected>Select User</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <select name="course_id" required>
            <option value="" disabled selected>Select Course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
            @endforeach
        </select>

        <label class="checkbox-label">
            <input type="checkbox" name="completed" value="1" />
            Completed
        </label>

        <button type="submit">Create</button>
    </form>
</body>

</html>