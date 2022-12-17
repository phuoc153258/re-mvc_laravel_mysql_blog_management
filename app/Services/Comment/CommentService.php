<?php

namespace App\Services\Comment;

use App\DTO\Request\Comment\PostCommentBlogRequestDTO;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Response\Comment\CommentResponseDTO;
use App\Models\Blog;
use App\Models\Comment;
use App\Services\Comment\ICommentService;
use App\Services\Paginate\PaginateService;
use Illuminate\Support\Facades\DB;

class CommentService implements ICommentService
{
    protected PaginateService $paginateService;

    public function __construct()
    {
        $this->paginateService = new PaginateService();
    }

    public function getList(BasePaginateRequestDTO $option, string $slug = null): mixed
    {
        $query =  DB::table($option->type_model->getType())
            ->join('blogs', 'comments.blog_id', '=', 'blogs.id');

        if ($slug != null) $query->where('blogs.slug', $slug);

        $data = $this->paginateService->paginate($option, $query);
        $data['data']  = $data['data']->select($option->type_model->getSelectIem())->get();
        return $data;
    }

    public function create(PostCommentBlogRequestDTO $commentRequest): CommentResponseDTO
    {
        $blog  = Blog::where('slug', $commentRequest->getSlug())->get()->first();
        $comment = Comment::create([
            'content' => $commentRequest->getComment(),
            'user_id' => $commentRequest->getUser()->id,
            'blog_id' => $blog->id
        ]);
        $commentDTO = new CommentResponseDTO($comment);
        return $commentDTO;
    }
}
