<?php

namespace App\Services\CommentLike;

interface ICommentLikeService
{
    public function getCountLikeInComment(int $comment_id): mixed;
}
