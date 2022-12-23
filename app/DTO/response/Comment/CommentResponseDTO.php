<?php

namespace App\DTO\Response\Comment;

use Illuminate\Http\Request;
use App\Services\CommentLike\CommentLikeService;

class CommentResponseDTO
{
    private int $id;
    private string $content;
    private int $user_id;
    private int $blog_id;
    private string $created_at;
    private string $updated_at;
    private string $avatar;
    private string $fullname;
    private mixed $likes;
    private string $blog_slug;
    private mixed $parent_id;

    public function __construct($comment)
    {
        $this->id = $comment->id;
        $this->content = $comment->content;
        $this->user_id = $comment->user_id;
        $this->blog_id = $comment->blog_id;
        $this->created_at = $comment->created_at;
        $this->updated_at = $comment->updated_at;
        $this->replies = $comment->replies;
        if (isset($comment->users)) {
            $this->avatar = $comment->users->avatar;
            $this->fullname = $comment->users->fullname;
        } else {
            $this->avatar = $comment->avatar;
            $this->fullname = $comment->fullname;
        }
        $this->likes = (new CommentLikeService())->getLikesInComment($comment->id);
        $this->blog_slug = $comment->blogs->slug;
        $this->parent_id = $comment->parent_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getBlogId()
    {
        return $this->blog_id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function getBlogSlug()
    {
        return $this->blog_slug;
    }

    public function getParentId()
    {
        return $this->parent_id;
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
            'avatar' => $this->avatar,
            'fullname' => $this->fullname,
            'likes' => $this->likes,
            'blog_slug' => $this->blog_slug,
            'parent_id' => $this->parent_id
        ];
    }
}
