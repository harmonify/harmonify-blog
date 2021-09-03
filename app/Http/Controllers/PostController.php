<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Utilities\PostUtilities;

class PostController extends Controller
{
    public function index()
    {
        $heading = PostUtilities::generateHeading(request());
        // dd($heading);
        return view('posts/index', [
          'title' => 'Posts',
          'active' => 'blog',
          'heading' => $heading,
          'posts' => Post::with(['category', 'author'])
            ->latest()
            ->filter(request(['search', 'category', 'author']))
            ->paginate(7)
            ->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts/show', [
          'title' => 'Single Post',
          'active' => 'blog',
          'post' => $post
        ]);
    }

}
