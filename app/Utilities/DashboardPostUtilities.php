<?php 

namespace App\Utilities;

use Illuminate\Support\Str;

class DashboardPostUtilities
{
    public static function generateData($post)
    {
        return [
            'excerpt' => static::generateExcerpt($post['body']),
            'user_id' => static::generateAuthorId(),
        ];
    }

    public static function generateExcerpt(string $str) : string
    {
        return Str::limit( strip_tags($str), 200, '...' );
    }
    
    public static function generateAuthorId()
    {
        return auth()->user()->id;
    }
}
