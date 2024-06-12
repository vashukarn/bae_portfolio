<?php

use App\Models\CMS\Blog;
use App\Models\SuperAdmin\BusinessSetting;
use Illuminate\Support\Str;


if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        if (in_array(Route::currentRouteName(), $routes, true)) {
            return $output;
        }
        return false;
    }
}


function readableDate($date, $type = null): string
{
    if ($date) {
        $date = strtotime($date);
        if ($type === 'all') {
            return date('F d, Y h:i a', $date);
        }

        if ($type === 'y') {
            return date('Y', $date);
        }
        if ($type === 'ym') {
            return date('F Y', $date);
        }
        if ($type === 'ymd') {
            return date('F d, Y', $date);
        }
        if ($type === 'mf') {
            return date('F  h:i a', $date);
        }
        if ($type === 'md') {
            return date('F d', $date);
        }
        if ($type === 'fdt') {
            return date('F d, h:i a', $date);
        }
        if ($type === 'dt') {
            return date('d, h:i a', $date);
        }
        if ($type === 'time') {
            return date('h:i a', $date);
        }
        if ($type === 'date') {
            return date('Y-m-d', $date);
        }
    }
    return '';
}


function readTime(Blog $blog): string
{
    return (string)(round(Str::wordCount($blog->content ?? 1) / 200, 0) ?? 'N/A');
}


function areActiveRoutes($routes, $output = "active")
{
    if (is_array($routes) && in_array(Route::currentRouteName(), $routes, true)) {
        return $output;
    }
    if (Route::currentRouteName() === $routes) {
        return $output;
    }
    return '';
}

function getBusinessSetting(string $key, string $default = '')
{
    $setting = BusinessSetting::where('key', $key)->first();
    if (config('app.env') === 'production') {
        return @$setting->prod_value;
    }
    return @$setting->dev_value;
}


function setBusinessSetting(string $key, string $value): string
{
    $setting = BusinessSetting::where('key', $key)->first();
    if (config('app.env') === 'production') {
        $setting->prod_value = $value;
    } else {
        $setting->dev_value = $value;
    }
    $setting->save();
    Cache::rememberForever('business_settings', static function () {
        return BusinessSetting::all();
    });
    return $value;
}
