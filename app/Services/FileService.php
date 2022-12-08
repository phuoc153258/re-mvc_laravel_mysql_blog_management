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
        if (!$file->getFileSize() > FILE_SIZE_LIMIT) return abort(400, trans('error.file.file-size'));
        if (!in_array($file->getExtension(), FILE_EXTENSION)) return abort(400, trans('error.file.format-file'));

        $file_type = getFileType($file->getFileType());
        $file_name = genarateUUID() . "." . $file->getExtension();

        $file->file->move($file_type, $file_name);
        return $file_type . "/" . $file_name;
    }

    public function delete(DeleteFileRequestDTO $file)
    {
        if (!File::exists($file->getFileName())) return abort(400, trans('error.file.file-not-exists '));

        if (in_array($file->getFileName(), FILE_IMAGE_BASE)) return abort(400, trans('error.file.can-not-delete-file'));

        File::delete($file->getFileName());

        return trans('success.file.delete-file');
    }
}
