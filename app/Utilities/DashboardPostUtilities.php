<?php 

namespace App\Utilities;

use Illuminate\Support\Str;

class DashboardPostUtilities
{
    public static function generateExcerpt(string $body) : string
    {
        return Str::limit( strip_tags($body), 200, '...' );
    }
    
}
