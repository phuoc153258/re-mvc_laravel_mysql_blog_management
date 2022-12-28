<?php

namespace App\DTO\Request\Comment;

class RateCommentBlogRequestDTO
{
    private string $comment_id;
    private string $rate_id;
    private mixed $user;

    public function __construct(int $comment_id, int $rate_id, mixed $user)
    {
        $this->comment_id  = $comment_id;
        $this->rate_id  = $rate_id;
        $this->user = $user;
    }

    public function getCommentId()
    {
        return $this->comment_id;
    }

    public function getRateId()
    {
        return $this->rate_id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function toArray()
    {
        return [
            'rate_id' => $this->rate_id,
            'comment_id' => $this->comment_id,
        ];
    }
}
