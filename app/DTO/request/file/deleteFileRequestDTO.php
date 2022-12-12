<?php

namespace App\DTO\Request\File;

use Illuminate\Http\Request;

class DeleteFileRequestDTO
{
    private string $file_name;

    public function __construct($file_name)
    {
        if (!$file_name)
            abort(400, trans('error.blog.delete'));
        $this->file_name = $file_name;
    }

    public function getFileName()
    {
        return $this->file_name;
    }
}
