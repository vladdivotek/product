<?php

namespace App\Jobs;

use App\Mail\NewPasswordMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ResetPasswordEmailJob implements ShouldQueue
{
    use Queueable, Dispatchable, SerializesModels;

    public function __construct(public User $user)
    {
        //
    }

    public function handle(): void
    {
        try {
            Mail::to($this->user->email)->send(new NewPasswordMail($this->user));
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
        }
    }
}
