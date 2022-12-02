<?php

if (!function_exists('stringToBool')) {
    function stringToBool($str)
    {
        return filter_var($str, FILTER_VALIDATE_BOOLEAN);
    }
}
