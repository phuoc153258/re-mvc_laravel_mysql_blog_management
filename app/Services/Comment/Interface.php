<?php

namespace App\Services\Comment;

use App\DTO\Request\Comment\PostCommentBlogRequestDTO;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Response\Comment\CommentResponseDTO;

interface ICommentService
{
    public function getListComment(BasePaginateRequestDTO $option, string $blog_id);

    public function createComment(PostCommentBlogRequestDTO $commentRequest);
}
