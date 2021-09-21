<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Utilities\PostUtilities as Utilities;

class PostController extends Controller
{
    public function index()
    {
        $heading = Utilities::generateHeading(request());
        // dd($heading);
        return view('blog.index', [
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
        // ddd($post, $post->load('comments'));
        return view('blog.show', [
          'title' => 'Single Post',
          'active' => 'blog',
          'post' => $post,
        ]);
    }

}
