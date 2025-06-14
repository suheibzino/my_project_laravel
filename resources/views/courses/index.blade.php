<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Courses List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            margin: 20px;
            color: #333;
        }

        h2 {
            color: #0d6efd;
            margin-bottom: 15px;
        }

        a.new-course {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        a.new-course:hover {
            background-color: #084cd1;
        }

        .success-message {
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #badbcc;
        }

        ul.courses-list {
            list-style: none;
            padding: 0;
            max-width: 700px;
            margin: 0;
        }

        ul.courses-list li {
            background-color: white;
            padding: 15px 20px;
            margin-bottom: 12px;
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        ul.courses-list li strong {
            font-size: 1.1rem;
        }

        ul.courses-list li .category {
            font-style: italic;
            color: #555;
            margin-left: 10px;
            flex-grow: 1;
        }

        ul.courses-list li .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        ul.courses-list li .actions a,
        ul.courses-list li .actions button {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        ul.courses-list li .actions a:hover {
            background-color: #084cd1;
        }

        ul.courses-list li .actions button {
            background-color: #dc3545;
        }

        ul.courses-list li .actions button:hover {
            background-color: #a02834;
        }

        ul.courses-list li .actions form {
            margin: 0;
        }
    </style>
</head>

<body>
    <h2>Courses</h2>
    <a href="{{ route('courses.create') }}" class="new-course">+ New Course</a>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <ul class="courses-list">
        @foreach($courses as $course)
            <li>
                <div>
                    <strong>{{ $course->title }}</strong>
                    <span class="category">| Category: {{ $course->category->name ?? 'N/A' }}</span>
                </div>
                <div class="actions">
                    <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this course?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</body>

</html>