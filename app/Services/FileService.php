<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use App\DTO\Request\File\DeleteFileRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;


class FileService
{
    public function __construct()
    {
    }

    public function upload(UploadFileRequestDTO $file)
    {
        if (!$file->getFileSize() > FILE_SIZE_LIMIT) return abort(400, MESSAGE_ERROR_FILE_SIZE);
        if (!in_array($file->getExtension(), FILE_EXTENSION)) return abort(400, MESSAGE_ERROR_FORMAT_FILE);

        $file_type = getFileType($file->getFileType());
        $file_name = genarateUUID() . "." . $file->getExtension();

        $file->file->move($file_type, $file_name);
        return $file_type . "/" . $file_name;
    }

    public function delete(DeleteFileRequestDTO $file)
    {
        if (!File::exists($file->getFileName())) return abort(400, MESSAGE_ERROR_FILE_NOT_EXISTS);

        if (in_array($file->getFileName(), FILE_IMAGE_BASE)) return abort(400, MESSAGE_ERROR_CAN_NOT_DELETE_FILE);

        File::delete($file->getFileName());

        return MESSAGE_SUCCESS_DELETE_FILE;
    }
}
