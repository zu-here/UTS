<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:20|unique:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'department' => 'required|string',
            'location' => 'string',
            'subsidy' => 'required|in:0,1',
            'role' => 'required|in:admin,driver,student',
        ]);

        $user = User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // hashed automatically
            'department' => $request->department,
            'location' => $request->location,
            'subsidy' => $request->subsidy,
            'role' => $request->role,
            'is_active',
            'is_available'
        ]);

        // dd($user);

        return back()->with('success', 'User added successfully!');
    }

    public function ban($id)
    {
        User::where('id', $id)->update([
            'is_active' => false
        ]);

        return back()->with('success', 'Student banned!');
    }

    public function unban($id)
    {
        User::where('id', $id)->update([
            'is_active' => true
        ]);

        return back()->with('success', 'Student unbanned!');
    }
}
