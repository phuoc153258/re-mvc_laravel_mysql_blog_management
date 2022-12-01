<?php

namespace App\DTO\Request\Blog;

use Illuminate\Http\Request;

class CreateBlogRequestDTO
{
    private string $title;
    private string $sub_title;
    private string $content;
    private int $user_id;

    public function __construct(Request $request)
    {
        $this->title = $request->input('title');
        $this->sub_title = $request->input('sub_title');
        $this->content = $request->input('content');
        $this->user_id = $request->input('user_id');
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSubTitle()
    {
        return $this->sub_title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getUserID()
    {
        return $this->user_id;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'content' => $this->content,
            'user_id' => $this->user_id
        ];
    }
}
