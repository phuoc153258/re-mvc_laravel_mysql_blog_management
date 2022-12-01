<?php

namespace App\DTO\Request\File;

use Illuminate\Http\Request;

class UploadFileRequestDTO
{
    public $file;
    private string $file_name;
    private string $extension;
    private string $file_type;
    private int $file_size;

    public function __construct(Request $request, string $type)
    {
        if (!$request->hasFile($type))  return abort(400, MESSAGE_ERROR_SELECT_FILE);
        $this->file = $request->file($type);
        $this->file_name = $this->file->getClientOriginalName($type);
        $this->extension = $this->file->getClientOriginalExtension($type);
        $this->file_type = $this->file->getClientMimeType($type);
        $this->file_size = $this->file->getSize();
    }

    public function getFileName()
    {
        return $this->file_name;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function getFileType()
    {
        return $this->file_type;
    }

    public function getFileSize()
    {
        return $this->file_size;
    }
}
