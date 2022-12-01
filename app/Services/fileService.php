<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\DTO\Request\File\UploadFileRequestDTO;


class FileService
{
    public function __construct()
    {
    }

    public static function upload(UploadFileRequestDTO $file)
    {
        if (!$file->getFileSize() > FILE_SIZE_LIMIT) return abort(400, MESSAGE_ERROR_FILE_SIZE);
        if (!in_array($file->getExtension(), FILE_EXTENSION)) return abort(400, MESSAGE_ERROR_FORMAT_FILE);

        $file_type = getFileType($file->getFileType());
        $file_name = genarateUUID() . "." . $file->getExtension();

        $file->file->move($file_type, $file_name);
        return $file_type . "/" . $file_name;
    }
}
