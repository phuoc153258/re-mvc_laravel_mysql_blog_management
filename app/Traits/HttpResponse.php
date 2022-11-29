<?php

namespace App\Traits;

trait HttpResponse
{
    protected function success($data = null, $message = null, $code = 200)
    {
        return response()->json([
            'status' => MESSAGE_BASE_SUCCESS_STATUS,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected function error($data = null, $message = null, $code = 400)
    {
        return response()->json([
            'status' => MESSAGE_BASE_FAILED_STATUS,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
