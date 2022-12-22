<?php

namespace App\Services\CommentLike;

interface ICommentLikeService
{
    public function getLikesInComment(int $comment_id): mixed;
}
