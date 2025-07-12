<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $course->title }} - Course Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
            color: #333;
        }

        .header {
            background-color: #2c3e50;
            color: #fff;
            padding: 25px 40px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .course-cover {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .course-title {
            font-size: 36px;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .course-meta {
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }

        .course-description {
            font-size: 18px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        /* تصميم زر الانضمام */
        .enroll-btn {
            background: linear-gradient(135deg, #6b73ff 0%, #000dff 100%);
            color: #fff;
            padding: 14px 30px;
            border-radius: 30px;
            font-size: 18px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 15px rgba(107, 115, 255, 0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 40px;
        }

        .enroll-btn:hover {
            background: linear-gradient(135deg, #000dff 0%, #6b73ff 100%);
            box-shadow: 0 12px 20px rgba(0, 13, 255, 0.5);
            transform: translateY(-3px);
        }

        .lessons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .lesson-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 20px;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .lesson-card:hover {
            transform: translateY(-5px);
        }

        .lesson-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #34495e;
        }

        .lesson-desc {
            font-size: 14px;
            margin-bottom: 10px;
            color: #666;
            flex-grow: 1;
        }

        .lesson-link {
            display: inline-block;
            margin-top: 5px;
            color: #2980b9;
            font-weight: 500;
            text-decoration: none;
            align-self: flex-start;
        }

        .lesson-link:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 60px;
            padding: 20px;
            text-align: center;
            color: #aaa;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>{{ $course->title }}</h1>
    </div>

    <div class="container">
        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="course-cover">

        <h2 class="course-title">{{ $course->title }}</h2>
        <p class="course-meta">Instructor: {{ $course->teacher }} | Duration: {{ $course->hours }} hours</p>

        <div class="course-description">
            {{ $course->description }}
        </div>

        @if(auth()->check())
            <form action="{{ url('/enrollments') }}" method="POST">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <button type="submit" class="enroll-btn">Enroll</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="enroll-btn">Login to Enroll</a>
        @endif

        <h3 style="margin-bottom: 20px; color: #2c3e50;">Lessons</h3>

        <div class="lessons-grid">
            @forelse($course->lessons as $lesson)
                <div class="lesson-card">
                    <div class="lesson-title">{{ $lesson->title }}</div>
                    <div class="lesson-desc">{{ $lesson->description }}</div>
                </div>
            @empty
                <p>There are no lessons after this course.</p>
            @endforelse
        </div>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} EduCourses. All rights reserved.
    </div>

</body>

</html>