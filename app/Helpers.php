<?php

if (!function_exists('getWherebyKey')) {
    function getWherebyKey()
    {
        return env('WHEREBY_API_KEY');
    }
}