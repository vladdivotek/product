<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_data;

    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('auth.password_new'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.emails.password-reset',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
