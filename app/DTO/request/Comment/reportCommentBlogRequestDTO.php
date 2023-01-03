<?php

namespace App\DTO\Request\Comment;

use Illuminate\Http\Request;

class ReportCommentBlogRequestDTO
{
    private int $comment_id;
    private int $report_id;
    private string $content;
    private mixed $user;

    public function __construct(Request $request, $comment_id, mixed $user)
    {
        $this->comment_id = $comment_id;
        $this->user = $user;
        $this->report_id = $request->input('report_id');
        $this->content = $request->input('content');
    }

    public function getCommentId()
    {
        return $this->comment_id;
    }

    public function getReportId()
    {
        return $this->report_id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function toArray()
    {
        return [
            'comment_id' => $this->comment_id,
            'report_id' => $this->report_id,
            'content' => $this->content
        ];
    }
}
