<?php

namespace App\Services\File;

use App\DTO\Request\File\DeleteFileRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;

interface IFileService
{
    public function upload(UploadFileRequestDTO $file): string;

    public function delete(DeleteFileRequestDTO $file): string;
}
