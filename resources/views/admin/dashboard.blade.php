<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }

        .navbar {
            background: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .tabs {
            display: flex;
            justify-content: center;
            background: #eee;
            padding: 10px;
        }

        .tabs a {
            margin: 0 15px;
            padding: 10px 15px;
            text-decoration: none;
            background: #ddd;
            color: #333;
            border-radius: 5px;
        }

        .tabs a:hover {
            background: #bbb;
        }

        .courses-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 250px;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-body h4 {
            margin: 0 0 10px;
        }

        .card-body p {
            margin: 5px 0;
            color: #666;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }

        .actions a {
            text-decoration: none;
            padding: 10px 15px;
            background: #28a745;
            color: white;
            border-radius: 5px;
            margin: 0 5px;
        }

        .actions a:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h2>لوحة تحكم الأدمن</h2>
    </div>

    <div class="tabs">
        <a href="#">التصنيف: برمجة</a>
        <a href="#">التصنيف: تصميم</a>
        <a href="#">التصنيف: تسويق</a>
    </div>

    <div class="actions">
        <a href="{{ route('categories.create') }}">إضافة تصنيف</a>
        <a href="{{ route('courses.create') }}">إضافة كورس</a>
        <a href="{{ route('lessons.create') }}">إضافة درس</a>
    </div>

    <div class="courses-container">
        @foreach ($courses as $course)
            <div class="card">
                <img src="{{ $course->image }}" alt="Course Image">
                <div class="card-body">
                    <h4>{{ $course->title }}</h4>
                    <p>المحاضر: {{ $course->instructor_name }}</p>
                    <p>السعر: {{ $course->price }}$</p>
                    <a href="{{ route('lessons.index', ['course_id' => $course->id]) }}">عرض الدروس</a>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>