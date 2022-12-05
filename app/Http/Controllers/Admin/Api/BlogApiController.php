<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\DTO\Request\Blog\CreateBlogRequestDTO;
use App\DTO\Request\Blog\UpdateBlogRequestDTO;
use App\Services\BlogService;
use App\Validate\BlogValidate;
use App\Traits\HttpResponse;

class BlogApiController extends Controller
{
    use HttpResponse;
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
            return $this->success($data, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function show($id)
    {
        try {
            $this->blogValidate->validateInfoIdBlog($id);
            $blogResponse = $this->blogService->show($id);
            return $this->success($blogResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function uploadImage(Request $request, $id)
    {
        try {
            $this->blogValidate->validateInfoIdBlog($id);
            $fileRequest = new UploadFileRequestDTO($request, 'file');
            $blogResponse = $this->blogService->uploadImage($fileRequest, $id);
            return $this->success($blogResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $this->blogValidate->validateInfoIdBlog($id);
            $this->blogService->deleteBlog($id);
            $option = new BasePaginateRequestDTO($request, 'blogs');
            $data = $this->blogService->getList($option);
            return $this->success($data, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    function create(Request $request)
    {
        try {
            $blogRequest = new CreateBlogRequestDTO($request);
            $fileRequest = new UploadFileRequestDTO($request, 'file');
            $this->blogValidate->validateInfoCreateBlog($blogRequest);
            $blogResponse = $this->blogService->createBlog($blogRequest, $fileRequest);
            return $this->success($blogResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }

    function update(Request $request, $id)
    {
        try {
            $blogRequest = new UpdateBlogRequestDTO($request, $id);
            $this->blogValidate->validateInfoUpdateBlog($blogRequest);
            $blogResponse = $this->blogService->updateBlog($blogRequest);
            return $this->success($blogResponse, MESSAGE_BASE_SUCCESS, 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), MESSAGE_BASE_FAILED, 400);
        }
    }
}
