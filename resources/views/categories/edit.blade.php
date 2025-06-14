<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            background-color: #fff;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            margin-left: 10px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Category</h2>

    {{-- عرض الأخطاء --}}
    @if ($errors->any())
        <div class="alert">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Category Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>

        <button type="submit">Update Category</button>
        <a href="{{ route('categories.index') }}" class="back-link">Cancel</a>
    </form>
</div>

</body>
</html>
