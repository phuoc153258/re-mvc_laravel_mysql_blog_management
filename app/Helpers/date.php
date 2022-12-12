<?php

use Illuminate\Support\Carbon;

if (!function_exists('formatDate')) {
    function formatDate($str)
    {
        $date = date_create($str);
        return date_format($date, "d/m/Y");
    }
}

if (!function_exists('getDateNow')) {
    function getDateNow()
    {
        return Carbon::now()->toDateTimeString();
    }
}

if (!function_exists('addMinutesToDate')) {
    function addMinutesToDate($date, $minutes)
    {
        return Carbon::parse($date)->addMinutes(5);
    }
}
