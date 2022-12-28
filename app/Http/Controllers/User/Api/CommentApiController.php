<?php

namespace App\Http\Controllers\User\Api;

use App\DTO\Request\Comment\LikeCommentBlogRequestDTO;
use App\DTO\Request\Comment\PostCommentBlogRequestDTO;
use App\DTO\Request\Comment\RateCommentBlogRequestDTO;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Traits\Authenticate;
use App\Services\Comment\CommentService;
use App\Validate\BlogValidate;
use App\Validate\CommentValidate;

class CommentApiController extends Controller
{
    use HttpResponse;
    use Authenticate;
    protected CommentService $commentService;
    protected BlogValidate $blogValidate;
    protected CommentValidate $commentValidate;

    public function __construct()
    {
        $this->commentService = new CommentService();
        $this->blogValidate = new BlogValidate();
        $this->commentValidate =  new CommentValidate();
    }

    public function getListComment(Request $request, $slug)
    {
        try {
            $this->blogValidate->validateSlugBlog($slug);
            $option = new BasePaginateRequestDTO($request, 'comments');
            $data = $this->commentService->getListComment($option, $slug);
            return $this->success($data, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function createComment(Request $request, $slug)
    {
        try {
            $user = $this->getInfoUser($request);
            $commentRequest = new PostCommentBlogRequestDTO($request, $slug, $user);
            $this->blogValidate->validateInfoPostCommentBlog($commentRequest);
            $data = $this->commentService->createComment($commentRequest);
            return $this->success($data->toJSON(), trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function likeComment(Request $request, $comment_id, $user_id)
    {
        try {
            $commentRequest = new LikeCommentBlogRequestDTO($comment_id, $user_id);
            $this->commentValidate->validateLikeCommentBlog($commentRequest);
            $data = $this->commentService->likeComment($commentRequest);
            return $this->success($data->toJSON(), trans('success.comment.like-comment'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }

    public function rateComment(Request $request, $comment_id, $rate_id)
    {
        try {
            $user = $this->getInfoUser($request);
            $commentRequest = new RateCommentBlogRequestDTO($comment_id, $rate_id, $user);
            $this->commentValidate->validateRateCommentBlog($commentRequest);
            $commentResponse = $this->commentService->rateComment($commentRequest);
            return $this->success($commentResponse, trans('base.base-success'), 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), trans('base.base-failed'), 400);
        }
    }
}
