<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->query('category');

        if ($categoryId) {
            $courses = Course::where('category_id', $categoryId)->get();
        } else {
            $courses = Course::all();
        }

        return view('landing', compact('categories', 'courses'));
    }
}
