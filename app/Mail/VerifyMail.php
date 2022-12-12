<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $token;

    public function __construct($user)
    {
        $this->user = $user;
        $this->token = $user->createToken('API Token')->plainTextToken;
    }

    public function build()
    {
        return $this->from(MAIL_ADMIN, MAIL_ADMIN_NAME)
            ->subject(MAIL_VERIFY_SUBJECT)
            ->view('mail.verify_mail')
            ->with("user", $this->user)
            ->with("token", $this->token);
    }
}
