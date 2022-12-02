<?php

namespace App\DTO\Response\Permission;

use Illuminate\Http\Request;

class PermissionResponseDTO
{
    private int $id;
    private string $name;
    private string $guard_name;
    private string $created_at;
    private string $updated_at;

    public function __construct($permission)
    {
        $this->id = $permission['id'];
        $this->name = $permission['name'];
        $this->guard_name = $permission['guard_name'];
        $this->created_at = formatDate($permission['created_at']);
        $this->updated_at = formatDate($permission['updated_at']);
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
