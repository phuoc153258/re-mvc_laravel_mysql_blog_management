<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\request\UploadFileRequestDTO;
use App\Services\FileService;

class FileApiController extends Controller
{
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
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_SUCCESS_UPLOAD_FILE,
                'data' => $fileResponse
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }
}
