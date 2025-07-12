<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>EduCourses - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafc;
            color: #333;
        }

        .navbar {
            background-color: #0d6efd;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        header.hero {
            background: linear-gradient(to right, #0d6efd, #2b8ff7);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }

        header.hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        header.hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn-main {
            background-color: white;
            color: #0d6efd;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-main:hover {
            background-color: #f0f0f0;
        }

        .categories {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            padding: 30px 10px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        .categories a {
            padding: 10px 22px;
            background-color: #e9ecef;
            border-radius: 30px;
            text-decoration: none;
            color: #0d6efd;
            font-weight: 600;
            border: 2px solid transparent;
            transition: all 0.3s;
        }

        .categories a.active,
        .categories a:hover {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 50px 20px;
            gap: 30px;
            background-color: #fff;
        }

        .feature-box {
            width: 250px;
            text-align: center;
            padding: 20px;
            background: #f1f5ff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .feature-box h3 {
            margin-top: 15px;
            color: #0d6efd;
        }

        .stats {
            background-color: #0d6efd;
            color: white;
            display: flex;
            justify-content: space-around;
            padding: 40px 0;
            text-align: center;
        }

        .stat-box h2 {
            font-size: 2.5rem;
            margin: 0;
        }

        .stat-box p {
            margin-top: 10px;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin: 50px 0 20px;
        }

        .courses-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            padding: 40px 20px;
            max-width: 1200px;
            margin: auto;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
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
            padding: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #1d3557;
        }

        .card-text {
            margin-bottom: 5px;
            color: #555;
        }

        .testimonials {
            background-color: #fff;
            padding: 50px 20px;
            text-align: center;
        }

        .testimonial {
            max-width: 600px;
            margin: 20px auto;
            font-style: italic;
            color: #666;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="brand">EduCourses</div>
        <div>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </div>
    </div>

    <header class="hero">
        <h1>Start Your Learning Journey with EduCourses</h1>
        <p>High-quality courses in all fields, anytime and anywhere.</p>
        <a href="{{ route('register') }}" class="btn-main">Join Now for Free</a>
    </header>

    <nav class="categories">
        <a href="{{ route('landing') }}" class="{{ is_null(request('category')) ? 'active' : '' }}">All Categories</a>
        @foreach ($categories as $category)
            <a href="{{ route('landing', ['category' => $category->id]) }}"
                class="{{ request('category') == $category->id ? 'active' : '' }}">{{ $category->name }}</a>
        @endforeach
    </nav>

    <section class="features">
        <div class="feature-box">
            <img src="https://img.icons8.com/color/64/000000/video.png" alt="Video Lessons" />
            <h3>Professional Video Lessons</h3>
            <p>Learn via high-quality video content from top instructors.</p>
        </div>
        <div class="feature-box">
            <img src="https://img.icons8.com/color/64/000000/certificate.png" alt="Certified" />
            <h3>Certified Certificates</h3>
            <p>Earn certificates upon course completion to boost your resume.</p>
        </div>
        <div class="feature-box">
            <img src="https://img.icons8.com/color/64/000000/online-support.png" alt="Support" />
            <h3>24/7 Support</h3>
            <p>We are here to assist you every step of your learning journey.</p>
        </div>
    </section>

    <section class="stats">
        <div class="stat-box">
            <h2>500+</h2>
            <p>Courses Available</p>
        </div>
        <div class="stat-box">
            <h2>10K+</h2>
            <p>Registered Students</p>
        </div>
        <div class="stat-box">
            <h2>100+</h2>
            <p>Professional Instructors</p>
        </div>
    </section>

    <div class="section-title">Featured Courses</div>
    <div class="courses-container">
        @forelse($courses as $course)
            <div class="card">
                <a href="{{ route('courses.show', $course->id) }}">
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" />
                    @else
                        <img src="https://via.placeholder.com/400x180?text=No+Image" alt="No Image" />
                    @endif
                </a>
                <div class="card-body">
                    <div class="card-title">{{ $course->title }}</div>
                    <div class="card-text">Instructor: {{ $course->teacher }}</div>
                    <div class="card-text">Hours: {{ $course->hours }}</div>
                </div>
            </div>
        @empty
            <p style="text-align:center;">No courses available at the moment.</p>
        @endforelse
    </div>

    <div class="section-title">Student Testimonials</div>
    <div class="testimonials">
        <div class="testimonial">"One of the best platforms I've used for self-learning. Well organized content and
            excellent instructors!" - John</div>
        <div class="testimonial">"Completed two courses so far and earned certificates, highly recommended." - Sarah
        </div>
    </div>

    <footer>© 2025 EduCourses. All rights reserved.</footer>
</body>

</html>