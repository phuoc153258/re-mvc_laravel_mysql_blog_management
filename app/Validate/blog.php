<?php

namespace App\Validate;

use App\DTO\Request\Blog\CreateBlogRequestDTO;
use App\DTO\Request\Blog\UpdateBlogRequestDTO;
use App\DTO\Request\Comment\PostCommentBlogRequestDTO;
use App\Traits\BaseValidate;
use Illuminate\Support\Facades\Validator;

class BlogValidate
{
    use BaseValidate;

    public function validateInfoIdBlog($id)
    {
        $validator = Validator::make(['id' => $id], [
            ...VALIDATE_ID_MYSQL
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoCreateBlog(CreateBlogRequestDTO $blogRequest)
    {
        $validator = Validator::make($blogRequest->toArray(), [
            ...VALIDATE_TITLE, ...VALIDATE_SUB_TITLE, ...VALIDATE_CONTENT, ...VALIDATE_USER_ID_MYSQL
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoUpdateBlog(UpdateBlogRequestDTO $blogRequest)
    {
        $validator = Validator::make($blogRequest->toArray(), [
            ...VALIDATE_TITLE, ...VALIDATE_SUB_TITLE, ...VALIDATE_CONTENT
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateSlugBlog($slug)
    {
        $validator = Validator::make(['slug' => $slug], [
            ...VALIDATE_SLUG
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoPostCommentBlog(PostCommentBlogRequestDTO $commentRequest)
    {
        $validator = Validator::make($commentRequest->toArray(), [
            ...VALIDATE_SLUG, ...VALIDATE_COMMENT, ...VALIDATE_PARENT_ID
        ]);
        return $this->baseRunCondition($validator);
    }
}
