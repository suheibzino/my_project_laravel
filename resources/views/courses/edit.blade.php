<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Course</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 20px;
            color: #333;
        }

        h2 {
            color: #0d6efd;
            margin-bottom: 25px;
        }

        form {
            background-color: #fff;
            max-width: 500px;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1.5px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            resize: vertical;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.4);
        }

        label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #444;
        }

        button[type="submit"] {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 7px;
            font-size: 1rem;
            cursor: pointer;
            font-weight: 700;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #084cd1;
        }
    </style>
</head>

<body>
    <h2>Edit Course</h2>
    <form method="POST" action="{{ route('courses.update', $course->id) }}">
        @csrf
        @method('PUT')

        <label for="title">Course Title</label>
        <input type="text" id="title" name="title" value="{{ $course->title }}" required>
        <!-- <input type="hidden" id="title" name="title1" value="" > -->

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4">{{ $course->description }}</textarea>

        <label for="image">Image URL</label>
        <input type="file" id="image" name="image" value="{{ $course->image }}">

        <label for="teacher">Teacher Name</label>
        <input type="text" id="teacher" name="teacher" value="{{ $course->teacher }}" required>

        <label for="hours">Hours</label>
        <input type="number" id="hours" name="hours" value="{{ $course->hours }}" required min="0">

        <label for="category_id">Category</label>
        <select id="category_id" name="category_id" required>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $course->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update</button>
    </form>
</body>

</html>