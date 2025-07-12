<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    public function dashboard(Request $request)
    {
        $categories = Category::all();

        $categoryId = $request->query('category');

        $courses = Course::when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();

        return view('student.dashboard', compact('categories', 'courses'));
    }
    public function profile()
    {
        return view('student.profile');
    }
    public function editProfile()
    {
        return view('profile.edit');
    }
}

