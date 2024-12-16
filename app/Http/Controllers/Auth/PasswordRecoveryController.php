<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\RecoveryPasswordEmailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PasswordRecoveryController extends Controller
{
    public function show()
    {
        return view('auth.password-recovery');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(60);

        if (DB::table('password_reset_tokens')->where('email', $request->input('email'))->get())
            DB::table('password_reset_tokens')->where('email', $request->input('email'))->delete();

        DB::table('password_reset_tokens')->insert([
            'email'=> $request->input('email'),
            'token' => $token,
            'created_at' => now()
        ]);

        $user = User::query()->where('email', $request->input('email'))->first();

        RecoveryPasswordEmailJob::dispatch($user);

        return back()->with(['password_recovery' => __('Recovery success')]);
    }
}
