<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Enrollments</title>
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
            margin-bottom: 25px;
        }

        a.new-enrollment {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        a.new-enrollment:hover {
            background-color: #218838;
        }

        p.success-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 12px 20px;
            border-radius: 5px;
            color: #155724;
            width: fit-content;
            margin: 10px auto 20px auto;
            text-align: center;
            font-weight: 600;
        }

        ul.enrollment-list {
            list-style: none;
            padding: 0;
            max-width: 600px;
            margin: 0 auto;
        }

        ul.enrollment-list li {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 7px rgb(0 0 0 / 0.1);
            margin-bottom: 15px;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1rem;
        }

        ul.enrollment-list li .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        ul.enrollment-list li .actions a,
        ul.enrollment-list li .actions button {
            background-color: transparent;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        ul.enrollment-list li .actions a:hover,
        ul.enrollment-list li .actions button:hover {
            background-color: #007bff;
            color: white;
        }

        ul.enrollment-list li .status {
            font-size: 1.2rem;
            margin-right: 15px;
        }

        form {
            display: inline;
        }
    </style>
</head>

<body>
    <h2>Enrollments</h2>
    <a href="{{ route('enrollments.create') }}" class="new-enrollment">+ New Enrollment</a>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <ul class="enrollment-list">
        @foreach($enrollments as $enrollment)
            <li>
                <div>
                    {{ $enrollment->user->name }} - {{ $enrollment->course->title }}
                </div>
                <div class="actions">
                    <span class="status">{{ $enrollment->completed ? '✅' : '❌' }}</span>
                    <a href="{{ route('enrollments.edit', $enrollment->id) }}">Edit</a>
                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this enrollment?');">
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