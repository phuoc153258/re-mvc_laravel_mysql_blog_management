<?php

namespace App\Validate;

use App\DTO\Request\Blog\CreateBlogRequestDTO;
use App\DTO\Request\Blog\UpdateBlogRequestDTO;
use App\Traits\BaseValidate;
use Illuminate\Support\Facades\Validator;

class BlogValidate
{
    use BaseValidate;

    public function validateInfoIdBlog($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => VALIDATE_ID_MYSQL,
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoCreateBlog(CreateBlogRequestDTO $blogRequest)
    {
        $validator = Validator::make($blogRequest->toArray(), [
            'title' => VALIDATE_STR,
            'sub_title' => VALIDATE_STR,
            'content' => VALIDATE_STR,
            'user_id' => VALIDATE_ID_MYSQL,
        ]);
        return $this->baseRunCondition($validator);
    }

    public function validateInfoUpdateBlog(UpdateBlogRequestDTO $blogRequest)
    {
        $validator = Validator::make($blogRequest->toArray(), [
            'title' => VALIDATE_STR,
            'sub_title' => VALIDATE_STR,
            'content' => VALIDATE_STR,
        ]);
        return $this->baseRunCondition($validator);
    }
}
