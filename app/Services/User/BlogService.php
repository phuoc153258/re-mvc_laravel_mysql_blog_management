<?php

namespace App\Services\User;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\DTO\Request\Blog\CreateBlogRequestDTO;
use App\DTO\Request\Blog\UpdateBlogRequestDTO;
use App\DTO\Request\File\DeleteFileRequestDTO;
use App\DTO\response\Blog\BlogResponseDTO;
use App\Models\Blog;
use App\Services\Base\PaginateService;
use App\Services\Base\FileService;

class BlogService
{
    protected PaginateService $paginateService;
    protected FileService $fileService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
        $this->fileService = new FileService();
    }

    public function getList(BasePaginateRequestDTO $option, $user_id = null)
    {
        $data = $this->paginateService->paginate($option, $user_id);
        return $data;
    }

    public function show($id, $user_id)
    {
        $blog = Blog::with('users')
            ->where([
                'id' => $id,
                'user_id' => $user_id
            ])
            ->get()
            ->first();
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

    public function updateBlog(UpdateBlogRequestDTO $blogRequest, $user_id)
    {
        $blog = Blog::where([
            'id' => $blogRequest->getID(),
            'user_id' => $user_id
        ])->get()->first();

        if ($blogRequest->getTitle() != $blog->title && $blogRequest->getTitle() != '') $blog->title = $blogRequest->getTitle();
        if ($blogRequest->getSubTitle() != $blog->sub_title && $blogRequest->getSubTitle() != '') $blog->sub_title = $blogRequest->getSubTitle();
        if ($blogRequest->getContent() != $blog->content && $blogRequest->getContent() != '') $blog->content = $blogRequest->getContent();

        $blog->save();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO->toJSON();
    }

    public function uploadImage(UploadFileRequestDTO $file, int $id, $user_id)
    {
        $blog = Blog::with('users')->where([
            'id' => $id,
            'user_id' => $user_id
        ])->get()->first();

        if (!$blog) return abort(400, MESSAGE_ERROR_BLOG_NOT_FOUND);

        $fileResponse = $this->fileService->upload($file);

        try {
            $fileDelete = new DeleteFileRequestDTO($blog->image);
            $fileDeleteResponse = $this->fileService->delete($fileDelete);
        } catch (\Throwable $th) {
        }

        $blog->image = $fileResponse;

        $blog->save();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO->toJSON();
    }

    public function deleteBlog($id, $user_id)
    {
        $blog = Blog::with('users')->where([
            'id' => $id,
            'user_id' => $user_id
        ])->get()->first();
        if (!$blog) return abort(400, MESSAGE_ERROR_BLOG_NOT_FOUND);
        $blog->delete();
    }
}
