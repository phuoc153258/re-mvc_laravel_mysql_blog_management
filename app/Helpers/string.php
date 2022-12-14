<?php

use Illuminate\Support\Str;

if (!function_exists('stringToBool')) {
    function stringToBool($str)
    {
        return filter_var($str, FILTER_VALIDATE_BOOLEAN);
    }
}

if (!function_exists('genarateSlug')) {
    function genarateSlug($str)
    {
        return Str::slug($str);
    }
}
