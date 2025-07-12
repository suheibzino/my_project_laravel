<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();

        $enrollments = Enrollment::with(['course.category'])
            ->where('user_id', $userId)
            ->get();

        // Group by category
        $groupedByCategory = $enrollments->groupBy(function ($enrollment) {
            return $enrollment->course->category->name ?? 'Uncategorized';
        });

        return view('enrollments.index', compact('groupedByCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $users = User::all();
        return view('enrollments.create', compact('courses', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        Enrollment::create([
            'course_id' => $request->course_id,
            'user_id' => Auth::id(),
            'completed' => false,
        ]);

        return redirect()->route('enrollments.index')->with('success', 'You have enrolled successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $courses = Course::all();
        $users = User::all();
        return view('enrollments.edit', compact('enrollment', 'courses', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'completed' => 'boolean'
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->all());
        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        if (request()->expectsJson()) {
            return response()->json(['message' => 'Enrollment deleted successfully.']);
        }
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}
