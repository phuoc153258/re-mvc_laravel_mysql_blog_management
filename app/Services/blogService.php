<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\DTO\request\BasePaginateRequestDTO;
use App\DTO\request\UploadFileRequestDTO;
use App\DTO\request\CreateBlogRequestDTO;
use App\DTO\request\UpdateBlogRequestDTO;
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
        $blog = DB::table('blogs')
            ->join('users', 'blogs.user_id', '=', 'users.id')
            ->where('blogs.id', '=', $id)
            ->select('blogs.*', 'users.username')
            ->first();
        return $blog;
    }

    public function uploadImage(UploadFileRequestDTO $file, int $id)
    {
        $blog = Blog::find($id);

        if (!$blog) return abort(400, MESSAGE_ERROR_BLOG_NOT_FOUND);

        $fileResponse = $this->fileService->upload($file);
        $blog->image = $fileResponse;

        $blog->save();
        return $blog;
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return $blog;
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
        return $blog;
    }

    public function updateBlog(UpdateBlogRequestDTO $blogRequest)
    {
        $blog = Blog::find($blogRequest->getID());

        if ($blogRequest->getTitle() != $blog->title && $blogRequest->getTitle() != '') $blog->title = $blogRequest->getTitle();
        if ($blogRequest->getSubTitle() != $blog->sub_title && $blogRequest->getSubTitle() != '') $blog->sub_title = $blogRequest->getSubTitle();
        if ($blogRequest->getContent() != $blog->content && $blogRequest->getContent() != '') $blog->content = $blogRequest->getContent();

        $blog->save();
        return $blog;
    }
}
