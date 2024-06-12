<?php

namespace App\Utility;

use Illuminate\Support\Str;

class FileUploadUtility
{
    public static function fileUploadLivewireRequest($file, string $path): string
    {
        if (is_string($file)) {
            return $file;
        }
        $temp_path = $file->store(path: "public/$path");
        $temp_path = Str::replace('public', 'storage', $temp_path);
        return config('app.url') . '/' . $temp_path;
    }
}
