<?php

namespace App\DTO\Request\Comment;

use Illuminate\Http\Request;

class DeleteCommentBlogRequestDTO
{
    private string $comment_id;
    private mixed $user;

    public function __construct(int $comment_id, mixed $user)
    {
        $this->comment_id  = $comment_id;
        $this->user  = $user;
    }

    public function getCommentId()
    {
        return $this->comment_id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function toArray()
    {
        return [
            'comment_id' => $this->comment_id,
        ];
    }
}
