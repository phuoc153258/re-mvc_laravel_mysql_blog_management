<?php

namespace App\DTO\Request\Permission;

use Illuminate\Http\Request;

class UpdatePermissionRequestDTO
{
    private int $id;
    private string $name;

    public function __construct(Request $request, $id)
    {
        $this->id = $id;
        $this->name = $request->input('name');
    }

    public function getID()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
