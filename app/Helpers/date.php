<?php

if (!function_exists('formatDate')) {
    function formatDate($str)
    {
        $date = date_create($str);
        return date_format($date, "d/m/Y");
    }
}
