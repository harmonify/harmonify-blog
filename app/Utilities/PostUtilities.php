<?php 

namespace App\Utilities;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostUtilities {
    public static function generateHeading(Request $request) : string
    {
        $heading = 'All Posts';
        if ($request->category) {
            $category = Category::firstWhere('slug', $request->category);
            $heading .= " in {$category->name}";
        }
        if ($request->author) {
            $author = User::firstWhere('username', $request->author);
            $heading .= " by {$author->name}";
        }

        return $heading;
    }
}