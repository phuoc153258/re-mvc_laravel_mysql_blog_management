<?php

namespace App\Validate;

use App\DTO\Request\Comment\LikeCommentBlogRequestDTO;
use App\Traits\BaseValidate;
use Illuminate\Support\Facades\Validator;

class CommentValidate
{
    use BaseValidate;

    public function validateLikeCommentBlog(LikeCommentBlogRequestDTO $commentRequest)
    {
        $validator = Validator::make($commentRequest->toArray(), [
            ...VALIDATE_COMMENT_ID_MYSQL, ...VALIDATE_USER_ID_MYSQL,
        ]);
        return $this->baseRunCondition($validator);
    }
}
