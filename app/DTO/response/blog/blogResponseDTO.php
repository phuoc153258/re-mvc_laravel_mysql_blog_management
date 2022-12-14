<?php

namespace App\DTO\Response\Blog;

class BlogResponseDTO
{
    private int $id;
    private string $title;
    private string $sub_title;
    private string $content;
    private string $slug;
    private string $image;
    private int $user_id;
    private ?string $username;
    private string $created_at;
    private string $updated_at;

    public function __construct($blog)
    {
        $this->id = $blog->id;
        $this->title = $blog->title;
        $this->sub_title = $blog->sub_title;
        $this->content = $blog->content;
        $this->slug = $blog->slug;
        $this->image = $blog->image;
        $this->user_id = $blog->user_id;
        $this->username = $blog->users->username;
        $this->created_at = formatDate($blog->created_at);
        $this->updated_at = formatDate($blog->updated_at);
    }

    public function toJSON()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'content' => $this->content,
            'slug' => $this->slug,
            'image' => $this->image,
            'user_id' => $this->user_id,
            'username' => $this->username,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
