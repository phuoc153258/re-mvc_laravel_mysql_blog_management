<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Authenticate
{
    protected function getInfoUser(Request $request)
    {
        return $request->user();
    }
}
