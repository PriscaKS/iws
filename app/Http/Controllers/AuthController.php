<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }
    public function showRegister()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phonenumber' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);
        $user = User::create($request->all());

        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
