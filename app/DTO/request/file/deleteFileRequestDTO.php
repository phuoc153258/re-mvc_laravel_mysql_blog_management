<?php

namespace App\DTO\Request\File;

use Illuminate\Http\Request;

class DeleteFileRequestDTO
{
    private string $file_name;

    public function __construct(Request $request)
    {
        if (!$request->input('file'))  return abort(400, MESSAGE_ERROR_SELECT_FILE);
        $this->file_name = $request->input('file');
    }

    public function getFileName()
    {
        return $this->file_name;
    }
}
