<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentApiController extends Controller
{
    public function index()
    {
        return Enrollment::with(['user', 'course'])->get();
    }
    public function store(Request $r)
    {
        return Enrollment::create($r->all());
    }
    public function show($id)
    {
        return Enrollment::findOrFail($id);
    }
    public function update(Request $r, $id)
    {
        $e = Enrollment::findOrFail($id);
        $e->update($r->all());
        return $e;
    }
    public function destroy($id)
    {
        Enrollment::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

    public function myCourses(Request $r)
    {
        return Enrollment::with('course')
            ->where('user_id', $r->user()->id)
            ->get()
            ->pluck('course');
    }

    public function enroll(Request $r)
    {
        $r->validate(['course_id' => 'required|exists:courses,id']);
        return Enrollment::firstOrCreate([
            'user_id' => $r->user()->id,
            'course_id' => $r->course_id
        ]);
    }
}