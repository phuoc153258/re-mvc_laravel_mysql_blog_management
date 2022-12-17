<?php

namespace App\DTO\Response\Comment;

use Illuminate\Http\Request;

class CommentResponseDTO
{
    private int $id;
    private string $content;
    private int $user_id;
    private int $blog_id;
    private string $created_at;
    private string $updated_at;

    public function __construct($comment)
    {
        $this->id = $comment->id;
        $this->content = $comment->content;
        $this->user_id = $comment->user_id;
        $this->blog_id = $comment->blog_id;
        $this->created_at = $comment->created_at;
        $this->updated_at = $comment->updated_at;
    }

    public function toJSON()
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'user_id' => $this->user_id,
            'blog_id' => $this->blog_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
