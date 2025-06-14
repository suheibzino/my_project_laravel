<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $courses = Course::all();
        $categories = Category::with('courses')->get();
        return view('admin.dashboard', compact('categories', 'courses'));
    }

}
