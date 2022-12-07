<?php

namespace App\DTO\Request\Mail;

use Illuminate\Http\Request;

class WelcomeMailRequestDTO
{
    private string $email;
    private array $data = MAIL_WELCOME_USER;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getData()
    {
        return $this->data;
    }

    public function toArray()
    {
        return [
            'email' => $this->email,
            'data' => $this->data
        ];
    }
}
