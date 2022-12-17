<?php

namespace App\DTO\Request\Comment;

use Illuminate\Http\Request;

class PostCommentBlogRequestDTO
{
    private string $slug;
    private string $comment;
    private $user;

    public function __construct(Request $request, $slug, $user)
    {
        $this->slug = $slug;
        $this->comment = $request->input('comment');
        $this->user = $user;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function toArray()
    {
        return [
            'slug' => $this->slug,
            'comment' => $this->comment,
        ];
    }
}
