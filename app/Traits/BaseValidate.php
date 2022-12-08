<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;

trait BaseValidate
{
    protected function baseRunCondition(Validator $validator)
    {
        if ($validator->fails()) {
            return abort(400, trans('error.validate.invalid-information'));
        }
    }
}
