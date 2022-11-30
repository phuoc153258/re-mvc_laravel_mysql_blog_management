<?php

namespace App\Validate;

use App\DTO\request\CreateBlogRequestDTO;
use App\DTO\request\UpdateBlogRequestDTO;
use Illuminate\Support\Facades\Validator;

class BlogValidate
{
    public function validateInfoIdBlog($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => VALIDATE_ID_MYSQL,
        ]);
        if ($validator->fails()) {
            return abort(400, MESSAGE_ERROR_INVALID_INFORMATION);
        }
    }

    public function validateInfoCreateBlog(CreateBlogRequestDTO $blogRequest)
    {
        $validator = Validator::make($blogRequest->toArray(), [
            'title' => VALIDATE_STR,
            'sub_title' => VALIDATE_STR,
            'content' => VALIDATE_STR,
            'user_id' => VALIDATE_ID_MYSQL,
        ]);
        if ($validator->fails()) {
            return abort(400, MESSAGE_ERROR_INVALID_INFORMATION);
        }
    }

    public function validateInfoUpdateBlog(UpdateBlogRequestDTO $blogRequest)
    {
        $validator = Validator::make($blogRequest->toArray(), [
            'title' => VALIDATE_STR,
            'sub_title' => VALIDATE_STR,
            'content' => VALIDATE_STR,
        ]);
        if ($validator->fails()) {
            return abort(400, MESSAGE_ERROR_INVALID_INFORMATION);
        }
    }
}
