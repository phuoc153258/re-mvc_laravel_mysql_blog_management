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
    // private int $like_count;
    private mixed $likes;

    public function __construct($comment)
    {
        $this->id = $comment->id;
        $this->content = $comment->content;
        $this->user_id = $comment->user_id;
        $this->blog_id = $comment->blog_id;
        $this->created_at = $comment->created_at;
        $this->updated_at = $comment->updated_at;
        if (isset($comment->users)) {
            dd($comment->users);
            $this->avatar = $comment->users->avatar;
            $this->fullname = $comment->users->fullname;
        } else {
            $this->avatar = $comment->avatar;
            $this->fullname = $comment->fullname;
        }
        $this->likes = (new CommentLikeService())->getCountLikeInComment($comment->id);
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
            // 'like_count' => $this->like_count
            'likes' => $this->likes
        ];
    }
}
