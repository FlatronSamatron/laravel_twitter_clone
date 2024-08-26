<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
           'name' => 'required|string',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|confirmed'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('dashboard')->with('success', 'Account was created successfully');
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function auth(Request $request): RedirectResponse
    {
        $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
        ]);

        if(auth()->attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }


        return redirect()->back()->withErrors([
                'email' => 'No matching user found with the provided email and password'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully');
    }
}
