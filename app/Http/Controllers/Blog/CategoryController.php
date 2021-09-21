<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('blog.categories', [
            'title' => 'Categories',
            'active' => 'blog',
            'heading' => 'All Categories',
            'categories' => Category::paginate(9),
        ]);
    }
}
