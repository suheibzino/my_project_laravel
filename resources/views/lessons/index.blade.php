<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lessons</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        .success-message {
            color: green;
            margin-bottom: 10px;
        }

        .btn {
            padding: 6px 12px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-edit {
            background-color: #28a745;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            padding: 10px;
        }

        td {
            padding: 8px;
        }
    </style>
</head>

<body>
    <h2>Lessons</h2>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <a href="{{ route('lessons.create') }}" class="btn">+ New Lesson</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Course</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->title }}</td>
                    <td>{{ $lesson->course->title ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-edit">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No lessons available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>