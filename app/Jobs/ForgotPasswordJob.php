<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;

class ForgotPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    protected string $otp;
    protected string $expired_time;

    public function __construct($user, $otp, $expired_time)
    {
        $this->user = $user;
        $this->otp = $otp;
        $this->expired_time = $expired_time;
    }

    public function handle()
    {
        Mail::to($this->user->email)->queue(new ForgotPassword($this->user, $this->otp, $this->expired_time));
    }
}
