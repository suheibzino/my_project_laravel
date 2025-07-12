<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {
        return Category::all();
    }
    public function store(Request $r)
    {
        return Category::create($r->all());
    }
    public function show($id)
    {
        return Category::findOrFail($id);
    }
    public function update(Request $r, $id)
    {
        $c = Category::findOrFail($id);
        $c->update($r->all());
        return $c;
    }
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

    public function coursesByCategory($id)
    {
        return Course::where('category_id', $id)->get();
    }
}
