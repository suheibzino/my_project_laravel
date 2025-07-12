<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard(Request $request)
    {
        $categories = Category::all();

        $query = Course::query();

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $courses = $query->get();

        return view('admin.dashboard', compact('categories', 'courses'));
    }

    public function createCourse()
    {
        $categories = Category::all();
        return view('courses.create', compact('categories'));
    }

    public function storeCourse(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'teacher' => 'required',
            'hours' => 'required|integer',
            'category_id' => 'required',
        ]);

        $path = $request->file('image')->store('courses', 'public');
        $validated['image'] = $path;

        Course::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Course created.');
    }

    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit-course', compact('course', 'categories'));
    }

    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('courses', 'public');
            $data['image'] = $path;
        }
        $course->update($data);
        return redirect()->route('admin.dashboard')->with('success', 'Course updated.');
    }

    public function deleteCourse($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Course deleted.');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }


}
