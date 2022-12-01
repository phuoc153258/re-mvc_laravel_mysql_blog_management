<?php

namespace App\DTO\Request\User;

use Illuminate\Http\Request;

class ChangePasswordUserRequestDTO
{
    private int $id;
    private string $old_password;
    private string $new_password;

    public function __construct(Request $request, $id)
    {
        $this->id = $id;
        $this->old_password = $request->input('old_password');
        $this->new_password = $request->input('new_password');
    }

    public function getID()
    {
        return $this->id;
    }

    public function getOldPassword()
    {
        return $this->old_password;
    }

    public function getNewPassword()
    {
        return $this->new_password;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'old_password' => $this->old_password,
            'new_password' => $this->new_password
        ];
    }
}
