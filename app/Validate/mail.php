<?php

namespace App\Validate;

use App\DTO\Request\Mail\WelcomeMailRequestDTO;
use App\Traits\BaseValidate;
use Illuminate\Support\Facades\Validator;

class MailValidate
{
    use BaseValidate;

    public function validateEmail(WelcomeMailRequestDTO $mailRequest)
    {
        $validator = Validator::make($mailRequest->toArray(), [
            ...VALIDATE_EMAIL
        ]);
        return $this->baseRunCondition($validator);
    }
}
