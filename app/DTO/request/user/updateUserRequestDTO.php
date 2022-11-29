<?php

namespace App\DTO\request;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class UpdateUserRequestDTO
{
    private int $id;
    private string $fullname;
    private string $email;

    public function __construct(Request $request, $id)
    {
        $this->id = $id;
        $this->fullname = $request->input('fullname');
        $this->email = $request->input('email');
    }

    public function getID()
    {
        return $this->id;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAll()
    {
        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
            'email' => $this->email,
        ];
    }
}
