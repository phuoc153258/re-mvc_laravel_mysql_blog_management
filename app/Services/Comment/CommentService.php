<?php

namespace App\Services\Comment;

use App\DTO\Request\Comment\LikeCommentBlogRequestDTO;
use App\DTO\Request\Comment\PostCommentBlogRequestDTO;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Response\Comment\CommentParentResponseDTO;
use App\DTO\Response\Comment\CommentResponseDTO;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\CommentLike;
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

    public function getListComment(BasePaginateRequestDTO $option, string $slug = null)
    {
        // $query =  DB::table($option->type_model->getType())
        //     ->join('blogs', 'comments.blog_id', '=', 'blogs.id')
        //     ->join('users', 'comments.user_id', '=', 'users.id');

        // if ($slug != null) $query->where('blogs.slug', $slug);

        // $data = $this->paginateService->paginate($option, $query);
        // $data['data']  = $data['data']->select($option->type_model->getSelectIem())->get();
        // $comments = [];
        // foreach ($data['data'] as &$item) {
        //     array_push($comments, (new CommentResponseDTO($item))->toJSON());
        // }
        // $data['data'] = $comments;
        // return $data;

        $blog  = Blog::where('blogs.slug', $slug)->get()->first();
        $data = Comment::with('replies')->with('users')->with('blogs')
            ->where('parent_id', null)
            ->where('blog_id', $blog->id)
            ->select()
            ->get();
        $comments = [];
        foreach ($data as &$item) {
            array_push($comments, (new CommentParentResponseDTO($item))->toJSON());
        }
        return $comments;
    }

    public function getComment(int $id)
    {
        $comment = Comment::with('replies')->with('users')->with('blogs')->find($id);
        $commentDTO = new CommentParentResponseDTO($comment);
        return $commentDTO;
    }

    public function createComment(PostCommentBlogRequestDTO $commentRequest)
    {
        $blog  = Blog::where('slug', $commentRequest->getSlug())->get()->first();
        $query = Comment::create([
            'content' => $commentRequest->getComment(),
            'user_id' => $commentRequest->getUser()->id,
            'blog_id' => $blog->id,
            'parent_id' => $commentRequest->getParentId()
        ]);
        return $this->getComment($query->id);
    }

    public function likeComment(LikeCommentBlogRequestDTO $commentRequest)
    {
        $like = CommentLike::where('user_id', $commentRequest->getUserId())
            ->where('comment_id', $commentRequest->getCommentId())->get()->first();
        if ($like != null) $like->delete();
        else
            $likeQuery = CommentLike::create($commentRequest->toArray());

        return $this->getComment($commentRequest->getCommentId());
    }
}
