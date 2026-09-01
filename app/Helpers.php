<?php

use Illuminate\Support\Facades\{ Log, Auth, Session };
use Carbon\Carbon;

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

if (!function_exists('formatUTCDate')) {
  function formatUTCDate(string $value)
  {
    return Carbon::parse($value, 'America/Sao_Paulo')
      ->setSeconds(0)
      ->timezone('UTC')
      ->format('Y-m-d\TH:i:s.000\Z');
  }
}

if (!function_exists('formatBrazilDate')) {
  function formatBrazilDate(string $value)
  {
    return Carbon::parse($value)->format('Y-m-d H:i:s');
  }
}

if (!function_exists('generateSlug')) {
  function generateSlug(string $string): string
  {
    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
    $string = preg_replace('/[\s-]+/', '-', $string);
    $string = trim($string, '-');

    return $string;
  }
}

if (!function_exists('notify')) {
  function notify($message = '', $icon = 'success')
  {
    Session::flash('notification', [
      'msg'  => $message,
      'icon' => $icon
    ]);
  }
}

if (!function_exists('reportError')) {
  function reportError(string $message, \Throwable $e)
  {
    Log::error($message, [
      'message' => $e->getMessage(),
      'line'    => $e->getLine(),
      'file'    => $e->getFile(),
    ]);
  }
}
