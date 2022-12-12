<?php

namespace App\DTO\Request\Auth;

use Illuminate\Http\Request;

class VerifyOTPRequestDTO
{
    private string $email;
    private string $otp;

    public function __construct(Request $request, $email)
    {
        $this->email = $email;
        $this->otp = $request->input('otp');
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getOTP()
    {
        return $this->otp;
    }

    public function toArray()
    {
        return [
            'email' => $this->email,
            'otp' => $this->otp,
        ];
    }
}
