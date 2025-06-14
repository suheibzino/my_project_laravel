<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Course</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 30px;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px 35px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #0d6efd;
            margin-bottom: 25px;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1.8px solid #ccc;
            border-radius: 7px;
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.3s ease;
            resize: vertical;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.4);
        }

        button {
            width: 100%;
            background-color: #0d6efd;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            font-weight: 700;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #084cd1;
        }
    </style>
</head>

<body>
    <form method="POST" action="{{ route('courses.store') }}">
        @csrf
        <h2>Create Course</h2>
        <input type="text" name="title" placeholder="Title" required />
        <textarea name="description" placeholder="Description"></textarea>
        <input type="text" name="image" placeholder="Image URL" />
        <input type="text" name="teacher" placeholder="Teacher name" required />
        <input type="number" name="hours" placeholder="Hours" required min="0" />
        <select name="category_id" required>
            <option value="">Select Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        <button type="submit">Create</button>
    </form>
</body>

</html>