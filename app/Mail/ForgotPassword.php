<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected string $otp;
    protected string $expired_time;

    public function __construct($user, $otp, $expired_time)
    {
        $this->user = $user;
        $this->otp = $otp;
        $this->expired_time = $expired_time;
    }

    public function build()
    {
        return $this->from(MAIL_ADMIN, MAIL_ADMIN_NAME)
            ->subject('OTP Forgot Password')
            ->view('mail.forgot_password')
            ->with("user", $this->user)
            ->with("otp", $this->otp)
            ->with("expired_time", $this->expired_time);
    }
}
