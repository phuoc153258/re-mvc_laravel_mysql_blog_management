<?php

namespace App\DTO\request;

use Illuminate\Http\Request;

class LoginUserRequestDTO
{
    private string $username;
    private string $password;

    public function __construct(Request $request)
    {
        $this->username = $request->input('username');
        $this->password = $request->input('password');
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAll()
    {
        return [
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}
