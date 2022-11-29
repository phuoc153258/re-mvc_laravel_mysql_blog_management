<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\request\BasePaginateRequestDTO;
use App\DTO\request\UploadFileRequestDTO;
use App\DTO\request\CreateBlogRequestDTO;
use App\DTO\request\UpdateBlogRequestDTO;
use App\Services\BlogService;
use App\Validate\BlogValidate;

class BlogApiController extends Controller
{
    protected BlogService $blogService;
    protected BlogValidate $blogValidate;

    public function __construct()
    {
        $this->blogService = new BlogService();
        $this->blogValidate = new BlogValidate();
    }

    public function index(Request $request)
    {
        try {
            $option = new BasePaginateRequestDTO($request, 'blogs');
            $data = $this->blogService->getList($option);
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }

    public function uploadImage(Request $request, $id)
    {
        try {
            $validate = $this->blogValidate->validateInfoIdBlog($id);
            $fileRequest = new UploadFileRequestDTO($request, 'file');
            $blogResponse = $this->blogService->uploadImage($fileRequest, $id);
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $blogResponse
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $validate = $this->blogValidate->validateInfoIdBlog($id);
            $this->blogService->deleteBlog($id);
            $option = new BasePaginateRequestDTO($request, 'blogs');
            $data = $this->blogService->getList($option);
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }

    function create(Request $request)
    {
        try {
            $blogRequest = new CreateBlogRequestDTO($request);
            $fileRequest = new UploadFileRequestDTO($request, 'file');
            $validate = $this->blogValidate->validateInfoCreateBlog($blogRequest);
            $blogResponse = $this->blogService->createBlog($blogRequest, $fileRequest);
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $blogResponse
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => MESSAGE_BASE_FAILED_STATUS,
                'message' => MESSAGE_BASE_FAILED,
                'data' => $th->getMessage()
            ]);
        }
    }

    function update(Request $request, $id)
    {
        try {
            $blogRequest = new UpdateBlogRequestDTO($request, $id);
            $validate = $this->blogValidate->validateInfoUpdateBlog($blogRequest);
            $blogResponse = $this->blogService->updateBlog($blogRequest);
            return response()->json([
                'status' => MESSAGE_BASE_SUCCESS_STATUS,
                'message' => MESSAGE_BASE_SUCCESS,
                'data' => $blogResponse
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
