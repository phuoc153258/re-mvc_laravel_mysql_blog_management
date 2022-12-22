<?php

namespace App\Services\CommentLike;

use App\Models\CommentLike;
use Illuminate\Support\Facades\DB;
use App\Services\Paginate\PaginateService;
use App\Services\CommentLike\ICommentLikeService;

class CommentLikeService implements ICommentLikeService
{
    protected PaginateService $paginateService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
    }
    public function getLikesInComment(int $comment_id): mixed
    {
        $likes = CommentLike::where('comment_id', $comment_id)->select()->get();
        return $likes;
    }

    public function likeComment()
    {
    }
}
