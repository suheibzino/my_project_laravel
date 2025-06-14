<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Categories</title>
    <style>
        /* Reset */
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
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #0d6efd;
            /* Bootstrap primary blue */
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .btn-new {
            background-color: #fff;
            color: #0d6efd;
            padding: 6px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid #0d6efd;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-new:hover {
            background-color: #0d6efd;
            color: white;
        }

        .card-body {
            padding: 25px;
        }

        .alert-success {
            background-color: #d1e7dd;
            border: 1px solid #badbcc;
            color: #0f5132;
            padding: 12px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .alert-info {
            background-color: #cff4fc;
            border: 1px solid #b6effb;
            color: #055160;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
            font-style: italic;
        }

        ul.category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul.category-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            border-bottom: 1px solid #ddd;
        }

        ul.category-list li strong {
            font-size: 1.1rem;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn-edit,
        .btn-delete {
            font-size: 0.875rem;
            padding: 5px 12px;
            border-radius: 6px;
            border: 2px solid transparent;
            cursor: pointer;
            text-decoration: none;
            user-select: none;
        }

        .btn-edit {
            background-color: #f8f9fa;
            border-color: #6c757d;
            color: #6c757d;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .btn-edit:hover {
            background-color: #6c757d;
            color: white;
        }

        .btn-delete {
            background-color: #f8d7da;
            border-color: #f5c2c7;
            color: #842029;
            transition: background-color 0.2s ease, color 0.2s ease;
            border: none;
        }

        .btn-delete:hover {
            background-color: #842029;
            color: white;
        }

        /* Form inline for delete button */
        form.inline {
            display: inline;
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h4>Categories</h4>
            <a href="{{ route('categories.create') }}" class="btn-new">+ New Category</a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($categories->count())
                <ul class="category-list">
                    @foreach($categories as $category)
                        <li>
                            <strong>{{ $category->name }}</strong>
                            <div class="actions">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">Edit</a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="alert-info">
                    No categories found.
                </div>
            @endif

        </div>
    </div>

</body>

</html>