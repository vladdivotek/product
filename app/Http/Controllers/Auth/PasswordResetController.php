<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\ResetPasswordEmailJob;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PasswordResetController extends Controller
{
    public function show(string $token)
    {
        return view('auth.password-reset', ['token' => $token]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required|exists:password_reset_tokens,token',
            'email' => 'required|email|exists:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (DB::table('password_reset_tokens')->where('email', $request->input('email'))->get())
            DB::table('password_reset_tokens')->where('email', $request->input('email'))->delete();

        $user = User::where('email', $request->input('email'))->first();
        $user->forceFill(['password' => Hash::make($request->input('password'))])->save();

        event(new PasswordReset($user));

        ResetPasswordEmailJob::dispatch($user);

        return back()->with(['password_reset' => __('Reset success')]);
    }
}
