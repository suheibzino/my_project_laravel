<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f1f2f7;
        }

        header {
            background-color: #0d6efd;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .filter-bar {
            padding: 1rem 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .filter-btn {
            background-color: #ffffff;
            border: 1px solid #ccc;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            text-decoration: none;
            color: #333;
            transition: 0.3s;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background-color: #0d6efd;
            color: white;
        }

        .container {
            padding: 2rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            padding: 1rem;
            flex: 1;
        }

        .card-title {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: #0d6efd;
        }

        .card-text {
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>

<body>

    <header>
        <div class="profile">
            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile">
            <span>{{ Auth::user()->name }}</span>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('enrollments.index') }}" class="btn btn-success"
                style="color: white; padding: 8px 14px; border-radius: 5px; background-color: #198754;">My Courses</a>
            <a href="{{ route('student.profile') }}" class="btn btn-light"
                style="color: #0d6efd; background: white; border: 1px solid #0d6efd; padding: 8px 14px; border-radius: 5px;">
                Profile
            </a>
        </div>
    </header>

    <div class="filter-bar">
        <a href="{{ route('student.dashboard') }}"
            class="filter-btn {{ is_null(request('category')) ? 'active' : '' }}">All</a>

        @foreach ($categories as $category)
            <a href="{{ route('student.dashboard', ['category' => $category->id]) }}"
                class="filter-btn {{ request('category') == $category->id ? 'active' : '' }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <div class="container">
        <div class="grid">
            @forelse ($courses as $course)
                <div class="card">
                    <a href="{{ route('courses.show', $course->id) }}" class="text-decoration-none text-dark">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
                    </a>
                    <div class="card-body">
                        <h2 class="card-title">{{ $course->title }}</h2>
                        <p class="card-text">Instructor: {{ $course->teacher }}</p>
                        <p class="card-text">Hours: {{ $course->hours }}</p>
                    </div>
                </div>
            @empty
                <p>No courses available.</p>
            @endforelse
        </div>
    </div>

</body>

</html>