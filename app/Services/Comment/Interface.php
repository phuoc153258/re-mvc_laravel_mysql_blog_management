<?php

namespace App\Services\Comment;

use App\DTO\Request\Comment\PostCommentBlogRequestDTO;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Response\Comment\CommentResponseDTO;

interface ICommentService
{
    public function getList(BasePaginateRequestDTO $option, string $blog_id): mixed;

    public function create(PostCommentBlogRequestDTO $commentRequest): CommentResponseDTO;
}
