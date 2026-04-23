<?php
use Illuminate\Support\Facades\App;

if (!function_exists('public_asset')) {
    function public_asset($path)
    {
        if (App::environment('production')) {
            return asset('public/' . ltrim($path, '/'));
        }

        return asset(ltrim($path, '/'));
    }
}