<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\DTO\Request\Blog\CreateBlogRequestDTO;
use App\DTO\Request\Blog\UpdateBlogRequestDTO;
use App\DTO\response\Blog\BlogResponseDTO;
use App\Models\Blog;
use App\Services\PaginateService;
use App\Services\FileService;

class BlogService
{
    protected PaginateService $paginateService;
    protected FileService $fileService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
        $this->fileService = new FileService();
    }

    public function getList(BasePaginateRequestDTO $option)
    {
        $data = (new PaginateService())->paginate($option);
        return $data;
    }

    public function show($id)
    {
        $blog = Blog::with('users')->where('id', $id)->get()->first();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO->toJSON();
    }

    public function uploadImage(UploadFileRequestDTO $file, int $id)
    {
        $blog = Blog::with('users')->where('id', $id)->get()->first();

        if (!$blog) return abort(400, MESSAGE_ERROR_BLOG_NOT_FOUND);

        $fileResponse = $this->fileService->upload($file);
        $blog->image = $fileResponse;

        $blog->save();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO->toJSON();
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO->toJSON();
    }

    public function createBlog(CreateBlogRequestDTO $blogRequest, UploadFileRequestDTO $fileRequest)
    {
        $blog = new Blog();

        if ($blogRequest->getUserID() == '' || $blogRequest->getUserID() == null) abort(400, MESSAGE_ERROR_USER_ID_NOT_FOUND);
        $blog->user_id = $blogRequest->getUserID();

        if ($blogRequest->getTitle() != '') $blog->title = $blogRequest->getTitle();
        if ($blogRequest->getSubTitle() != '') $blog->sub_title = $blogRequest->getSubTitle();
        if ($blogRequest->getContent() != '') $blog->content = $blogRequest->getContent();

        $blog->image = $this->fileService->upload($fileRequest);

        $blog->save();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO->toJSON();
    }

    public function updateBlog(UpdateBlogRequestDTO $blogRequest)
    {
        $blog = Blog::find($blogRequest->getID());

        if ($blogRequest->getTitle() != $blog->title && $blogRequest->getTitle() != '') $blog->title = $blogRequest->getTitle();
        if ($blogRequest->getSubTitle() != $blog->sub_title && $blogRequest->getSubTitle() != '') $blog->sub_title = $blogRequest->getSubTitle();
        if ($blogRequest->getContent() != $blog->content && $blogRequest->getContent() != '') $blog->content = $blogRequest->getContent();

        $blog->save();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO->toJSON();
    }
}
