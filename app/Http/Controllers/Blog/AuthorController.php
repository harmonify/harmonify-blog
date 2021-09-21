<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('blog.authors', [
            'title' => 'Authors',
            'active' => 'blog',
            'heading' => 'All Authors',
            'authors' => User::paginate(10),
        ]);
    }
}
