<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lessons - {{ $course->title }}</title>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 2rem;
            background-color: #f4f6f9;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            color: #2c3e50;
            margin: 0;
        }

        .add-btn {
            background-color: #0d6efd;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
            cursor: pointer;
            border: none;
        }

        .add-btn:hover {
            background-color: #0b5ed7;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
            padding: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card h3 {
            margin: 0 0 0.5rem 0;
            color: #333;
        }

        .card p {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 0.5rem;
        }

        .card a.video-link {
            color: #0d6efd;
            font-size: 0.85rem;
            word-break: break-all;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .actions {
            margin-top: auto;
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-edit {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .no-lessons {
            text-align: center;
            color: #888;
            font-style: italic;
            margin-top: 2rem;
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
            max-width: 480px;
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

        form label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #444;
        }

        form input[type="text"],
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
    <div class="header">
        <h1>Lessons for: {{ $course->title }}</h1>
        <button class="add-btn" onclick="openAddLessonModal()">+ Add New Lesson</button>
    </div>

    @if ($lessons->isEmpty())
        <p class="no-lessons">No lessons found for this course.</p>
    @else
        <div class="grid">
            @foreach ($lessons as $lesson)
                <div class="card">
                    <h3>{{ $lesson->title }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($lesson->description, 80) }}</p>
                    <a href="{{ $lesson->youtube_url }}" target="_blank" class="video-link">
                        {{ \Illuminate\Support\Str::limit($lesson->youtube_url, 50) }}
                    </a>
                    <div class="actions">
                        <button class="btn-sm btn-edit"
                            onclick="openEditLessonModal({{ $lesson->id }}, '{{ addslashes($lesson->title) }}', '{{ addslashes($lesson->description) }}', '{{ $lesson->youtube_url }}')">Edit</button>
                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this lesson?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div id="modalAddLesson" class="modal-bg">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('modalAddLesson')">&times;</span>
            <h3>Add New Lesson</h3>
            <form method="POST" action="{{ route('lessons.store') }}">
                @csrf
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <label for="add_title">Title</label>
                <input type="text" id="add_title" name="title" required>

                <label for="add_description">Description</label>
                <textarea id="add_description" name="description" rows="3" required></textarea>

                <label for="add_youtube_url">YouTube URL</label>
                <input type="text" id="add_youtube_url" name="youtube_url" required>

                <button type="submit">Add Lesson</button>
            </form>
        </div>
    </div>

    <div id="modalEditLesson" class="modal-bg">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('modalEditLesson')">&times;</span>
            <h3>Edit Lesson</h3>
            <form id="formEditLesson" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="course_id" value="{{ $course->id }}">

                <label for="edit_title">Title</label>
                <input type="text" id="edit_title" name="title" required>

                <label for="edit_description">Description</label>
                <textarea id="edit_description" name="description" rows="3" required></textarea>

                <label for="edit_youtube_url">YouTube URL</label>
                <input type="text" id="edit_youtube_url" name="youtube_url" required>

                <button type="submit">Update Lesson</button>
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

        function openAddLessonModal() {
            document.getElementById('add_title').value = '';
            document.getElementById('add_description').value = '';
            document.getElementById('add_youtube_url').value = '';
            openModal('modalAddLesson');
        }

        function openEditLessonModal(id, title, description, youtube_url) {
            const form = document.getElementById('formEditLesson');
            form.action = '/lessons/' + id; 

            document.getElementById('edit_title').value = title;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_youtube_url').value = youtube_url;

            openModal('modalEditLesson');
        }

        window.onclick = function(event) {
            const modals = ['modalAddLesson', 'modalEditLesson'];
            modals.forEach(id => {
                let modal = document.getElementById(id);
                if (event.target == modal) {
                    closeModal(id);
                }
            });
        }
    </script>
</body>

</html>
