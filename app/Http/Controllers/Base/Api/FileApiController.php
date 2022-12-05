<?php

namespace App\Http\Controllers\Base\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\Request\File\DeleteFileRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\Services\Base\FileService;
use App\Traits\HttpResponse;

class FileApiController extends Controller
{
    use HttpResponse;
    protected FileService $file_service;

    public function __construct()
    {
        $this->file_service = new FileService();
    }

    public function upload(Request $request)
    {
        try {
            $fileRequest = new UploadFileRequestDTO($request, 'file');
            $fileResponse = $this->file_service->upload($fileRequest);
            return $this->success($fileResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function delete(Request $request)
    {
        try {
            $fileRequest = new DeleteFileRequestDTO($request->input('file'));
            $fileResponse = $this->file_service->delete($fileRequest);
            return $this->success($fileResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
