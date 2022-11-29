<?php

use Illuminate\Support\Facades\Hash;

if (!function_exists('hashPassword')) {
    function hashPassword($password)
    {
        return Hash::make($password);
    }
}

if (!function_exists('checkPasswordHash')) {
    function checkPasswordHash($password, $hashedPassword)
    {
        return Hash::check($password, $hashedPassword);
    }
}
