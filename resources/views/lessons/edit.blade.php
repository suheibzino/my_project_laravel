<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lesson</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #444;
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
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        button,
        .back-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        button:hover,
        .back-btn:hover {
            background-color: #2980b9;
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
        <h2>Edit Lesson</h2>

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

        <form method="POST" action="{{ route('lessons.update', $lesson->id) }}">
            @csrf
            @method('PUT')

            <label for="title">Lesson Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $lesson->title) }}" required>

            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description', $lesson->description) }}</textarea>

            <label for="video_url">YouTube Video URL</label>
            <input type="url" id="video_url" name="video_url" value="{{ old('video_url', $lesson->video_url) }}">

            <label for="course_id">Select Course</label>
            <select id="course_id" name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $lesson->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>

            <div class="buttons">
                <button type="submit">Update Lesson</button>
                <a href="{{ route('lessons.index') }}" class="back-btn">Cancel</a>
            </div>
        </form>
    </div>

</body>

</html>