<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lesson</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"],
        input[type="url"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        button,
        .back-link {
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        button:hover,
        .back-link:hover {
            background-color: #218838;
        }

        .back-link {
            background-color: #6c757d;
        }

        .back-link:hover {
            background-color: #5a6268;
        }

        .error-box {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Create New Lesson</h2>

        @if ($errors->any())
            <div class="error-box">
                <strong>Whoops!</strong> Please fix the following errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('lessons.store') }}">
            @csrf

            <label for="title">Lesson Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>

            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>

            <label for="video_url">Video URL</label>
            <input type="url" name="video_url" id="video_url" value="{{ old('video_url') }}">

            <label for="course_id">Select Course</label>
            <select name="course_id" id="course_id" required>
                <option value="">Select Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>

            <div class="btn-group">
                <button type="submit">Create Lesson</button>
                <a href="{{ route('lessons.index') }}" class="back-link">Back</a>
            </div>
        </form>
    </div>

</body>

</html>