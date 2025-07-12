<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Enrolled Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #0d6efd;
        }

        .category-tabs {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 30px;
            gap: 10px;
        }

        .category-tab {
            background-color: #e0e0e0;
            color: #333;
            padding: 8px 16px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-transform: capitalize;
        }

        .category-tab.active,
        .category-tab:hover {
            background-color: #0d6efd;
            color: white;
        }

        .grid {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .grid.active {
            display: grid;
        }

        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: 0.3s;
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
            flex-grow: 1;
        }

        .card-title {
            font-size: 18px;
            margin: 0 0 10px;
            color: #343a40;
        }

        .card-meta {
            font-size: 14px;
            color: #666;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            padding: 10px 15px;
        }

        .btn-unenroll {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            transition: background 0.3s;
        }

        .btn-unenroll:hover {
            background-color: #c82333;
        }

        .no-courses {
            text-align: center;
            margin-top: 50px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>My Enrolled Courses</h1>

        @if($groupedByCategory->isEmpty())
            <p class="no-courses">You have not enrolled in any courses yet.</p>
        @else
            <div class="category-tabs">
                @foreach($groupedByCategory as $categoryName => $enrollments)
                    <div class="category-tab" data-category="{{ Str::slug($categoryName) }}">{{ $categoryName }}</div>
                @endforeach
            </div>

            @foreach($groupedByCategory as $categoryName => $enrollments)
                <div class="grid" id="{{ Str::slug($categoryName) }}">
                    @foreach($enrollments as $enrollment)
                        <div class="card">
                            <a href="{{ route('lessons.byCourse', $enrollment->course->id) }}">
                                <img src="{{ asset('storage/' . $enrollment->course->image) }}"
                                    alt="{{ $enrollment->course->title }}">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $enrollment->course->title }}</h3>
                                    <p class="card-meta">Instructor: {{ $enrollment->course->teacher }}</p>
                                    <p class="card-meta">Hours: {{ $enrollment->course->hours }}</p>
                                </div>
                            </a>
                            <div class="actions">
                                <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to unenroll?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-unenroll">Unenroll</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>

    <script>
        const tabs = document.querySelectorAll('.category-tab');
        const grids = document.querySelectorAll('.grid');

        if (tabs.length > 0) {
            tabs[0].classList.add('active');
            const defaultCategory = tabs[0].dataset.category;
            document.getElementById(defaultCategory).classList.add('active');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => t.classList.remove('active'));
                    grids.forEach(g => g.classList.remove('active'));

                    tab.classList.add('active');
                    document.getElementById(tab.dataset.category).classList.add('active');
                });
            });
        }
    </script>

</body>

</html>