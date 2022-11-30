<?php

namespace App\DTO\response;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class UserResponseDTO
{
    private int $id;
    private string $username;
    private string $fullname;
    private string $email;
    private string $avatar;
    private string $created_at;
    private string $updated_at;

    public function __construct($user)
    {
        $this->id = $user->id;
        $this->username = $user->username;
        $this->fullname = $user->fullname;
        $this->email = $user->email;
        $this->avatar = $user->avatar;
        $this->created_at = formatDate($user->created_at);
        $this->updated_at = formatDate($user->updated_at);
    }

    public function toJSON()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
