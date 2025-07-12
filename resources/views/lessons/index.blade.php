<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lessons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
        }

        .lessons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .lesson-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 20px;
            display: flex;
            flex-direction: column;
            transition: 0.3s;
        }

        .lesson-card:hover {
            transform: translateY(-5px);
        }

        .lesson-title {
            font-size: 20px;
            font-weight: bold;
            color: #34495e;
            margin-bottom: 10px;
        }

        .lesson-desc {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
            flex-grow: 1;
        }

        .youtube-link {
            display: inline-block;
            background-color: #e74c3c;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            text-align: center;
            transition: background-color 0.3s;
        }

        .youtube-link:hover {
            background-color: #c0392b;
        }

        .no-lessons {
            text-align: center;
            color: #999;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Lessons for: {{ $course->title }}</h2>

        @if($course->lessons->isEmpty())
            <p class="no-lessons">No lessons available yet.</p>
        @else
            <div class="lessons-grid">
                @foreach($course->lessons as $lesson)
                    <div class="lesson-card">
                        <div class="lesson-title">{{ $lesson->title }}</div>
                        <div class="lesson-desc">{{ $lesson->description }}</div>
                        @if($lesson->video_url)
                            <a href="{{ $lesson->video_url }}" class="youtube-link" target="_blank">Watch on YouTube</a>
                        @else
                            <span class="lesson-desc" style="color: #aaa;">No video link available</span>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>

</html>