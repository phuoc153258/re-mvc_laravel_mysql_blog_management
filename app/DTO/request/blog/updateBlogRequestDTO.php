<?php

namespace App\DTO\Request\Blog;

use Illuminate\Http\Request;

class UpdateBlogRequestDTO
{
    private int $id;
    private string $title;
    private string $sub_title;
    private string $content;

    public function __construct(Request $request, $id)
    {
        $this->id = $id;
        $this->title = $request->input('title');
        $this->sub_title = $request->input('sub_title');
        $this->content = $request->input('content');
    }

    public function getID()
    {
        return $this->id;
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

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'content' => $this->content
        ];
    }
}
