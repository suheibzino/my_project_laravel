@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit User</h1>

        {{-- عرض الأخطاء إن وجدت --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password (leave blank if not changing)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input type="text" name="image" id="image" value="{{ old('image', $user->image) }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection