<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonApiController extends Controller
{
    public function index()
    {
        return Lesson::all();
    }
    public function store(Request $r)
    {
        return Lesson::create($r->all());
    }
    public function show($id)
    {
        return Lesson::findOrFail($id);
    }
    public function update(Request $r, $id)
    {
        $l = Lesson::findOrFail($id);
        $l->update($r->all());
        return $l;
    }
    public function destroy($id)
    {
        Lesson::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

    public function lessonsByCourse($courseId)
    {
        return Lesson::where('course_id', $courseId)->get();
    }
}
