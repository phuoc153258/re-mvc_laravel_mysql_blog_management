<?php

namespace App\DTO\Response\Comment;

class CommentParentResponseDTO
{
    private CommentResponseDTO $commentResponse;
    private mixed $replies;

    public function __construct($comment)
    {
        $this->commentResponse = new CommentResponseDTO($comment);
        $this->replies = $comment->replies;
        $repliesArr = [];
        foreach ($comment->replies as &$item)
            array_push($repliesArr, (new CommentResponseDTO($item))->toJSON());
        $this->replies = $repliesArr;
    }

    public function toJSON()
    {
        return [
            'id' => $this->commentResponse->getId(),
            'content' => $this->commentResponse->getContent(),
            'user_id' => $this->commentResponse->getUserId(),
            'blog_id' => $this->commentResponse->getBlogId(),
            'created_at' => $this->commentResponse->getCreatedAt(),
            'updated_at' => $this->commentResponse->getUpdatedAt(),
            'avatar' => $this->commentResponse->getAvatar(),
            'fullname' => $this->commentResponse->getFullname(),
            'blog_slug' => $this->commentResponse->getBlogSlug(),
            'parent_id' => $this->commentResponse->getParentId(),
            'likes' => $this->commentResponse->getLikes(),
            'rates' => $this->commentResponse->getRates(),
            'replies' => $this->replies
        ];
    }
}
