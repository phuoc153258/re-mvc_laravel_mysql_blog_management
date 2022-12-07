<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function build()
    {
        return $this->from(MAIL_ADMIN, MAIL_ADMIN_NAME)
            ->subject(MAIL_WELCOME_USER["subject"])
            ->view('mail.welcome')->with("data", MAIL_WELCOME_USER);
    }
}
