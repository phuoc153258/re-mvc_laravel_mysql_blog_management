<?php

namespace App\DTO\response;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DeleteUserResponseDTO
{
    private int $id;
    private string $username;
    private Date $created_at;
    private Date $updated_at;

    public function __construct($data)
    {
        $this->id = $data->id;
        $this->username = $data->username;
        $this->created_at = $data->created_at;
        $this->updated_at = $data->updated_at;
    }

    public function toJSON()
    {
        return [
            $this->id, $this->username, $this->created_at, $this->updated_at
        ];
    }
}
