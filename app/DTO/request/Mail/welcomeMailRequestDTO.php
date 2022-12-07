<?php

namespace App\DTO\Request\Mail;

use Illuminate\Http\Request;

class WelcomeMailRequestDTO
{
    private string $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function toArray()
    {
        return [
            'email' => $this->email
        ];
    }
}
