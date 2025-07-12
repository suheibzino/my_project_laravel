<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Category</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: #0d6efd;
            color: white;
            padding: 20px 25px;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card-body {
            padding: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 1rem;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1.5px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #0d6efd;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn {
            padding: 10px 18px;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            user-select: none;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-success {
            background-color: #198754;
            color: white;
            border: 2px solid #198754;
        }

        .btn-success:hover {
            background-color: #146c43;
            border-color: #146c43;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: 2px solid #6c757d;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: #565e64;
            border-color: #565e64;
        }

        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c2c7;
            color: #842029;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert-danger li {
            margin-bottom: 5px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card-header">Create New Category</div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('categories.store') }}">
                @csrf

                <label for="name">Category Name</label>
                <input type="text" id="name" name="name" placeholder="Enter category name" value="{{ old('name') }}"
                    required />

                <label for="description">Description</label>
                <textarea id="description" name="description"
                    placeholder="Enter description">{{ old('description') }}</textarea>

                <button type="submit" class="btn btn-success">Create Category</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</body>

</html>