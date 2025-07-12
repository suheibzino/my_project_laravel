<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function store(Request $r)
    {
        $r->validate(['email' => 'required|email|unique:users', 'password' => 'required']);
        $r['password'] = Hash::make($r->password);
        return User::create($r->all());
    }
    public function show($id)
    {
        return User::findOrFail($id);
    }
    public function update(Request $r, $id)
    {
        $u = User::findOrFail($id);
        if ($r->filled('password'))
            $r['password'] = Hash::make($r->password);
        else
            unset($r['password']);
        $u->update($r->all());
        return $u;
    }
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
