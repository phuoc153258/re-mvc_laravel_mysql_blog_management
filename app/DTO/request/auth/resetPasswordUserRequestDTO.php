<?php

namespace App\DTO\Request\Auth;

use Illuminate\Http\Request;

class ResetPasswordUserRequestDTO
{
    private mixed $user;
    private string $password;

    public function __construct($user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function toArray()
    {
        return [
            'user' => $this->user,
            'password' => $this->password,
        ];
    }
}
