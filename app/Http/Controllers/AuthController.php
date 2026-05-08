<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);

        // login using id + password
        if (Auth::attempt([
            'id' => $credentials['id'],
            'password' => $credentials['password'],
            'is_active' => 1
        ])) {

            $request->session()->regenerate();

            $user = Auth::user();

            // redirect based on role
            if ($user->role === 'admin') {
                return redirect('/admin');
            }

            else if ($user->role === 'driver') {
                return redirect("/driver/{$user->id}/dashboard");
            }

            return redirect("/student/{$user->id}/dashboard");
        }

        return back()->with('error', 'Invalid credentials or account banned.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}