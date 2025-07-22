<?php

use Illuminate\Support\Facades\{ Auth };

if (!function_exists('loggedUser')) {
    function loggedUser()
    {
        return Auth::user();
    }
}

if (!function_exists('getWherebyKey')) {
    function getWherebyKey()
    {
        return env('WHEREBY_API_KEY');
    }
}