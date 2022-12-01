<?php

namespace App\DTO\response;

use Illuminate\Http\Request;

class RoleResponseDTO
{
    private int $id;
    private string $name;
    private string $guard_name;
    private string $created_at;
    private string $updated_at;

    public function __construct($role)
    {
        $this->id = $role->id;
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->created_at = formatDate($role->created_at);
        $this->updated_at = formatDate($role->updated_at);
    }

    public function toJSON()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
