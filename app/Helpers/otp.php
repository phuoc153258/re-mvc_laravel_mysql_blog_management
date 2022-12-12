<?php

if (!function_exists('genarateOtp')) {
    function genarateOtp()
    {
        return rand(100000, 999999);
    }
}
