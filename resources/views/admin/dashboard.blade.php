<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f1f2f7;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            background-color: #0d6efd;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0b5ed7;
        }

        .container {
            padding: 2rem;
        }

        .filter-bar {
            margin-bottom: 2rem;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
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
        }

        .card-text {
            font-size: 0.9rem;
            color: #555;
        }

        .card-actions {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #eee;
        }

        .btn-edit {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.9rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .add-course-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: #0d6efd;
            color: white;
            padding: 0.8rem 1.4rem;
            border-radius: 30px;
            text-decoration: none;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
            z-index: 1000;
            cursor: pointer;
        }

        .add-course-float:hover {
            background-color: #0b5ed7;
        }

        .modal-bg {
            display: none;
            position: fixed;
            z-index: 1100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 8% auto;
            padding: 20px 30px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
            position: relative;
        }

        .modal-content h3 {
            margin-top: 0;
            color: #0d6efd;
        }

        .close-btn {
            position: absolute;
            right: 15px;
            top: 12px;
            font-size: 24px;
            font-weight: bold;
            color: #aaa;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-btn:hover {
            color: #000;
        }

        /* فورم */
        form label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #444;
        }

        form input[type="text"],
        form input[type="number"],
        form select,
        form textarea {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 15px;
            border: 1.5px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            font-family: inherit;
            resize: vertical;
        }

        form input[type="file"] {
            margin-bottom: 15px;
        }

        form button {
            background-color: #0d6efd;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 7px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #084cd1;
        }
    </style>
</head>

<body>

    <header>
        <h1>Admin Dashboard</h1>
        <a href="{{ route('admin.profile') }}" class="btn">Admin Profile</a>
    </header>

    <div class="container">

        <div class="filter-bar">
            <a href="{{ route('admin.dashboard') }}"
                class="filter-btn {{ is_null(request('category')) ? 'active' : '' }}">All</a>

            @foreach ($categories as $category)
                <a href="{{ route('admin.dashboard', ['category' => $category->id]) }}"
                    class="filter-btn {{ request('category') == $category->id ? 'active' : '' }}">
                    {{ $category->name }}
                </a>
                <button class="btn-sm btn-edit"
                    onclick="openEditCategoryModal({{ $category->id }}, '{{ $category->name }}')">Edit</button>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this category?')" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-sm btn-delete">Delete</button>
                </form>
            @endforeach

            <button class="btn-sm btn" style="margin-left: auto;" onclick="openAddCategoryModal()">+ Add
                Category</button>
        </div>

        <div class="grid">
            @forelse ($courses as $course)
                <div class="card">
                    <a href="{{ route('admin.lessons.show', ['course' => $course->id]) }}"
                        style="text-decoration: none; color: inherit;">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
                        <div class="card-body">
                            <h2 class="card-title">{{ $course->title }}</h2>
                            <p class="card-text">Instructor: {{ $course->teacher }}</p>
                            <p class="card-text">Hours: {{ $course->hours }}</p>
                        </div>
                    </a>
                    <div class="card-actions">
                        <button class="btn-sm btn-edit"
                            onclick="openEditCourseModal({{ $course->id }}, '{{ addslashes($course->title) }}', '{{ addslashes($course->description) }}', '{{ $course->teacher }}', {{ $course->hours }}, {{ $course->category_id }})">Edit</button>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this course?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No courses available for this category.</p>
            @endforelse
        </div>
    </div>

    <button class="add-course-float" onclick="openAddCourseModal()">+ Add Course</button>

    <div id="modalAddCategory" class="modal-bg">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('modalAddCategory')">&times;</span>
            <h3>Add New Category</h3>
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <label for="category_name">Category Name</label>
                <input type="text" id="category_name" name="name" required>
                <button type="submit">Add Category</button>
            </form>
        </div>
    </div>

    <div id="modalEditCategory" class="modal-bg">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('modalEditCategory')">&times;</span>
            <h3>Edit Category</h3>
            <form id="formEditCategory" method="POST" action="">
                @csrf
                @method('PUT')
                <label for="edit_category_name">Category Name</label>
                <input type="text" id="edit_category_name" name="name" required>
                <button type="submit">Update Category</button>
            </form>
        </div>
    </div>

    <div id="modalAddCourse" class="modal-bg">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('modalAddCourse')">&times;</span>
            <h3>Add New Course</h3>
            <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                @csrf
                <label for="course_title">Title</label>
                <input type="text" id="course_title" name="title" required>

                <label for="course_description">Description</label>
                <textarea id="course_description" name="description" rows="3" required></textarea>

                <label for="course_image">Image</label>
                <input type="file" id="course_image" name="image" required>

                <label for="course_teacher">Teacher</label>
                <input type="text" id="course_teacher" name="teacher" required>

                <label for="course_hours">Hours</label>
                <input type="number" id="course_hours" name="hours" min="0" required>

                <label for="course_category">Category</label>
                <select id="course_category" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <button type="submit">Add Course</button>
            </form>
        </div>
    </div>

    <div id="modalEditCourse" class="modal-bg">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('modalEditCourse')">&times;</span>
            <h3>Edit Course</h3>
            <form id="formEditCourse" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="edit_course_title">Title</label>
                <input type="text" id="edit_course_title" name="title" required>

                <label for="edit_course_description">Description</label>
                <textarea id="edit_course_description" name="description" rows="3" required></textarea>

                <label for="edit_course_image">Image (leave blank to keep current)</label>
                <input type="file" id="edit_course_image" name="image">

                <label for="edit_course_teacher">Teacher</label>
                <input type="text" id="edit_course_teacher" name="teacher" required>

                <label for="edit_course_hours">Hours</label>
                <input type="number" id="edit_course_hours" name="hours" min="0" required>

                <label for="edit_course_category">Category</label>
                <select id="edit_course_category" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <button type="submit">Update Course</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'block';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }

        function openAddCategoryModal() {
            openModal('modalAddCategory');
        }

        function openEditCategoryModal(id, name) {
            const form = document.getElementById('formEditCategory');
            form.action = '/categories/' + id;
            document.getElementById('edit_category_name').value = name;
            openModal('modalEditCategory');
        }

        function openAddCourseModal() {
            openModal('modalAddCourse');
        }

        function openEditCourseModal(id, title, description, teacher, hours, category_id) {
            const form = document.getElementById('formEditCourse');
            form.action = '/admin/courses/' + id;
            document.getElementById('edit_course_title').value = title;
            document.getElementById('edit_course_description').value = description;
            document.getElementById('edit_course_teacher').value = teacher;
            document.getElementById('edit_course_hours').value = hours;
            document.getElementById('edit_course_category').value = category_id;
            openModal('modalEditCourse');
        }

        window.onclick = function (event) {
            const modals = ['modalAddCategory', 'modalEditCategory', 'modalAddCourse', 'modalEditCourse'];
            modals.forEach(id => {
                let modal = document.getElementById(id);
                if (event.target == modal) {
                    closeModal(id);
                }
            });
        };
    </script>

</body>

</html>