<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function show(): View
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $user = User::query()->create([
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);

        if ($user && Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Incorrect credentials.',
        ]);
    }
}
