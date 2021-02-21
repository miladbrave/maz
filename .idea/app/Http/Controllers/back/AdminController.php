<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('admin','admin')->get();
        return view('back.admin.admin', compact('admins'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($user)
    {
        $users = User::paginate(20);
        return view('back.admin.user', compact('users'));
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);
        $user->admin = "admin";
        $user->save();
        return back();
    }

    public function update(Request $request, $user)
    {

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->admin == "user")
            $user->delete();

        if ($user->admin == "admin")
            $user->admin = "user";
        $user->save();

        return back();
    }
}
