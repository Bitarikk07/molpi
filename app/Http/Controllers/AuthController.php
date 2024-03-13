<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    ///Register
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $request = request()->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:4'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('login')->with('message', 'Account created Successfully');
    }

    ///Login
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        // dd(request('_token'));
        $request = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        if (auth()->attempt($request)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('message', 'Logged in Successfully');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'No matcing user found with the provided email and password'
        ]);
    }



    ////Logout
    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('message', 'Logged out Successfully');
    }
}
