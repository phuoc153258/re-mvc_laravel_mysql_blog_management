<?php

namespace App\Services\Comment;

use App\DTO\Request\Comment\DeleteCommentBlogRequestDTO;
use App\DTO\Request\Comment\LikeCommentBlogRequestDTO;
use App\DTO\Request\Comment\PostCommentBlogRequestDTO;
use App\DTO\Request\Comment\RateCommentBlogRequestDTO;
use App\DTO\Request\Comment\ReportCommentBlogRequestDTO;
use App\DTO\Request\Paginate\BasePaginateRequestDTO;
use App\DTO\Response\Comment\CommentParentResponseDTO;
use App\DTO\Response\Comment\CommentResponseDTO;
use App\DTO\Response\Comment\RateCommentResponseDTO;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\CommentReport;
use App\Models\Rate;
use App\Models\RateComment;
use App\Models\Report;
use App\Models\User;
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
        else $likeQuery = CommentLike::create($commentRequest->toArray());

        return $this->getComment($commentRequest->getCommentId());
    }

    public function rateComment(RateCommentBlogRequestDTO $commentRequest)
    {
        $rate = RateComment::where('comment_id', $commentRequest->getCommentId())
            ->where('user_id', $commentRequest->getUser()->id)->get()->first();
        $rateDTO = new RateCommentResponseDTO();
        if (!$rate)
            $this->createRateComment($commentRequest);
        else {
            $rate->rate_id = $commentRequest->getRateId();
            $rate->save();
        }
        $rates = $this->getRateInComment($commentRequest->getCommentId());

        $rateArray = [];
        foreach ($rates as &$value) {
            array_push($rateArray, (new RateCommentResponseDTO($value))->toJSON());
        }
        return $rateArray;
    }

    public function getRateInComment(int $comment_id)
    {
        $rate = RateComment::with('rates')->where('comment_id', $comment_id)->select()->get();
        return $rate;
    }

    public function createRateComment(RateCommentBlogRequestDTO $commentRequest)
    {
        return RateComment::create([
            'comment_id' => $commentRequest->getCommentId(),
            'user_id' => $commentRequest->getUser()->id,
            'rate_id' => $commentRequest->getRateId()
        ]);
    }

    public function deleteComment(DeleteCommentBlogRequestDTO $commentRequest)
    {
        $roleName = (array) $commentRequest->getUser()->getRoleNames();
        $comment = Comment::with('blogs')->where('id', $commentRequest->getCommentId())->get()->first();
        if (
            $comment->user_id !== $commentRequest->getUser()->id
            && $comment->blogs->user_id !== $commentRequest->getUser()->id
            && in_array("admin", $roleName)
        )
            abort(400, trans('error.comment.do-not-have-permission-to-delete'));

        $comment->delete();
        $commentDTO = new CommentParentResponseDTO($comment);
        return $commentDTO;
    }

    public function createReportComment(ReportCommentBlogRequestDTO $commentRequest)
    {
        $commentReport = CommentReport::where('user_id', $commentRequest->getUser()->id)
            ->where('comment_id', $commentRequest->getCommentId())->get()->first();
        if (!$commentReport) $commentReport = new CommentReport();

        $user = User::find($commentRequest->getUser()->id);
        if (!$user)  abort(400, trans('error.user.user-not-found'));
        $commentReport->user_id = $commentRequest->getUser()->id;

        $comment = Comment::find($commentRequest->getCommentId());
        if (!$comment) abort(400, trans('error.comment.comment-id-not-found'));
        $commentReport->comment_id = $commentRequest->getCommentId();

        $report = Report::find($commentRequest->getReportId());
        if (!$report) abort(400, trans('error.report.report-id-not-found'));
        $commentReport->report_id = $commentRequest->getReportId();

        $commentReport->content = $commentRequest->getContent();

        $commentReport->save();

        return $commentReport;
    }

    public function getListReportMyBlog(BasePaginateRequestDTO $option, mixed $user)
    {
        $query =  DB::table($option->type_model->getType())
            ->join('users', 'comment_reports.user_id', '=', 'users.id')
            ->join('reports', 'comment_reports.report_id', '=', 'reports.id')
            ->join('comments', 'comment_reports.comment_id', '=', 'comments.id')
            ->join('blogs', 'comments.blog_id', '=', 'blogs.id');

        if ($user)
            $query->where('blogs.user_id', '=', $user->id);

        $data = $this->paginateService->paginate($option, $query);
        $data['data']  = $data['data']->select($option->type_model->getSelectIem())->get();
        return $data;
    }
}
