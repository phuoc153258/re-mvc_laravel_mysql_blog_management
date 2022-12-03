<?php

namespace App\DTO\Request\File;

use Illuminate\Http\Request;

class DeleteFileRequestDTO
{
    private string $file_name;

    public function __construct($file_name)
    {
        if (!$file_name)  return abort(400, MESSAGE_ERROR_SELECT_FILE);
        $this->file_name = $file_name;
    }

    public function getFileName()
    {
        return $this->file_name;
    }
}
