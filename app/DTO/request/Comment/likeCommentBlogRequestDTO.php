<?php

namespace App\DTO\Request\Comment;

use Illuminate\Http\Request;

class LikeCommentBlogRequestDTO
{
    private string $comment_id;
    private string $user_id;

    public function __construct(int $comment_id, int $user_id)
    {
        $this->comment_id  = $comment_id;
        $this->user_id  = $user_id;
    }

    public function getCommentId()
    {
        return $this->comment_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function toArray()
    {
        return [
            'user_id' => $this->user_id,
            'comment_id' => $this->comment_id,
        ];
    }
}
