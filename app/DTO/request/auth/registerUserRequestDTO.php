<?php

namespace App\DTO\request;

use Illuminate\Http\Request;

class RegisterUserRequestDTO
{
    private string $username;
    private string $fullname;
    private string $email;
    private string $password;

    public function __construct(Request $request)
    {
        $this->username = $request->input('username');
        $this->fullname = $request->input('fullname');
        $this->email = $request->input('email');
        $this->password = $request->input('password');
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function toArray()
    {
        return [
            'username' => $this->username,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'password' => hashPassword($this->password),
        ];
    }
}
