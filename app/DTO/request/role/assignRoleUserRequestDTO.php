<?php

namespace App\DTO\Request\Role;

use Illuminate\Http\Request;

class AssignRoleUserRequestDTO
{
    private int $user_id;
    private int $role_id;

    public function __construct($user_id, $role_id)
    {
        $this->user_id = $user_id;
        $this->role_id = $role_id;
    }

    public function getUserID()
    {
        return $this->user_id;
    }

    public function getRoleID()
    {
        return $this->role_id;
    }

    public function toArray()
    {
        return [
            'user_id' => $this->user_id,
            'role_id' => $this->role_id,
        ];
    }
}
