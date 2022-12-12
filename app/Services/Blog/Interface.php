<?php

namespace App\Services\Blog;

use App\DTO\Request\Blog\CreateBlogRequestDTO;
use App\DTO\Request\Blog\UpdateBlogRequestDTO;
use App\DTO\Request\File\UploadFileRequestDTO;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Response\Blog\BlogResponseDTO;

interface IBlogService
{
    public function getList(BasePaginateRequestDTO $option, int $user_id): mixed;

    public function show(int $id, int $user_id): BlogResponseDTO;

    public function createBlog(CreateBlogRequestDTO $blogRequest, UploadFileRequestDTO $fileRequest): BlogResponseDTO;

    public function updateBlog(UpdateBlogRequestDTO $blogRequest, $user_id = null): BlogResponseDTO;

    public function uploadImage(UploadFileRequestDTO $file, int $id, $user_id = null): BlogResponseDTO;

    public function deleteBlog(int $id, int $user_id = null): void;
}
