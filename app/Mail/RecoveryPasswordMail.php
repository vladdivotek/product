<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class RecoveryPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_data, $token;

    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
        $this->token = DB::table('password_reset_tokens')->where('email', $mail_data->email)->first()->token;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('auth.password_recovery'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.emails.password-recovery',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
