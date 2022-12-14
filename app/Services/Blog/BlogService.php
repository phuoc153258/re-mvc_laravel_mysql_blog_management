<?php

namespace App\Services\Blog;

use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\DTO\Request\Blog\CreateBlogRequestDTO;
use App\DTO\Request\Blog\UpdateBlogRequestDTO;
use App\DTO\Request\File\DeleteFileRequestDTO;
use App\DTO\response\Blog\BlogResponseDTO;
use App\Models\Blog;
use App\Services\Paginate\PaginateService;
use App\Services\File\FileService;
use App\Services\Blog\IBlogService;

class BlogService implements IBlogService
{
    protected PaginateService $paginateService;
    protected FileService $fileService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
        $this->fileService = new FileService();
    }

    public function getList(BasePaginateRequestDTO $option, $user_id = null): mixed
    {
        $data = $this->paginateService->paginate($option, $user_id);
        return $data;
    }

    public function show($id, $user_id = null): BlogResponseDTO
    {
        $blog = Blog::with('users')
            ->where('id', $id);
        if ($user_id != null || $user_id != '') {
            $blog->where('blogs.user_id', $user_id);
        }
        $blogDTO = new BlogResponseDTO($blog->get()->first());
        return $blogDTO;
    }

    public function createBlog(CreateBlogRequestDTO $blogRequest, UploadFileRequestDTO $fileRequest): BlogResponseDTO
    {
        $blog = new Blog();

        if ($blogRequest->getUserID() == '' || $blogRequest->getUserID() == null) abort(400, trans('error.user.user-id-not-found'));
        $blog->user_id = $blogRequest->getUserID();

        if ($blogRequest->getTitle() != '') {
            $blog->title = $blogRequest->getTitle();
            $blog->slug = genarateSlug($blogRequest->getTitle());
        }

        if ($blogRequest->getSubTitle() != '') $blog->sub_title = $blogRequest->getSubTitle();
        if ($blogRequest->getContent() != '') $blog->content = $blogRequest->getContent();



        $blog->image = $this->fileService->upload($fileRequest);

        $blog->save();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO;
    }

    public function updateBlog(UpdateBlogRequestDTO $blogRequest, $user_id = null): BlogResponseDTO
    {
        $blogQuery = Blog::with('users')
            ->where('id', $blogRequest->getID());
        if ($user_id != null || $user_id != '') {
            $blogQuery->where('blogs.user_id', $user_id);
        }

        $blog = $blogQuery->get()->first();

        if ($blogRequest->getTitle() != $blog->title && $blogRequest->getTitle() != '') {
            $blog->title = $blogRequest->getTitle();
            $blog->slug = genarateSlug($blogRequest->getTitle());
        }
        if ($blogRequest->getSubTitle() != $blog->sub_title && $blogRequest->getSubTitle() != '') $blog->sub_title = $blogRequest->getSubTitle();
        if ($blogRequest->getContent() != $blog->content && $blogRequest->getContent() != '') $blog->content = $blogRequest->getContent();

        $blog->save();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO;
    }

    public function uploadImage(UploadFileRequestDTO $file, int $id, $user_id = null): BlogResponseDTO
    {
        $blogQuery = Blog::with('users')
            ->where('id', $id);
        if ($user_id != null || $user_id != '') {
            $blogQuery->where('blogs.user_id', $user_id);
        }

        $blog = $blogQuery->get()->first();

        if (!$blog)  abort(400, trans('error.blog.blog-not-found'));

        $fileResponse = $this->fileService->upload($file);

        try {
            $fileDelete = new DeleteFileRequestDTO($blog->image);
            $fileDeleteResponse = $this->fileService->delete($fileDelete);
        } catch (\Throwable $th) {
        }

        $blog->image = $fileResponse;

        $blog->save();
        $blogDTO = new BlogResponseDTO($blog);
        return $blogDTO;
    }

    public function deleteBlog($id, $user_id = null): void
    {
        $blogQuery = Blog::with('users')
            ->where('id', $id);
        if ($user_id != null || $user_id != '') {
            $blogQuery->where('blogs.user_id', $user_id);
        }

        $blog = $blogQuery->get()->first();

        if (!$blog)  abort(400, trans('error.blog.blog-not-found'));
        $blog->delete();
    }
}
