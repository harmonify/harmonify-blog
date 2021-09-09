<?php

namespace App\Utilities;

use Illuminate\Support\Str;

class DashboardPostUtilities
{
    public static function generateExcerpt(string $str) : string
    {
        return Str::limit( strip_tags($str), 200, '...' );
    }

    public static function generateAuthorId() : string|int
    {
        return auth()->user()->id;
    }

    public static function storeThumbnail($thumbnail) : string
    {
        return $thumbnail->store('thumbnails');
    }
}
