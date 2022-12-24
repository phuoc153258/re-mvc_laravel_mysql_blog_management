<?php

namespace App\DTO\Request\Comment;

use Illuminate\Http\Request;

class PostCommentBlogRequestDTO
{
    private string $slug;
    private string $comment;
    private ?int $parent_id = null;
    private $user;

    public function __construct(Request $request, $slug, $user)
    {
        $this->slug = $slug;
        $this->comment = $request->input('comment');
        $this->parent_id = $request->input('parent_id');
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

    public function getParentId()
    {
        return $this->parent_id;
    }

    public function toArray()
    {
        return [
            'slug' => $this->slug,
            'comment' => $this->comment,
            'parent_id' => $this->parent_id,
        ];
    }
}
