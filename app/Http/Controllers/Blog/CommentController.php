<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Post $post)
    {
        $request = $request->validated();

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'body' => $request['body'],
            // 'parent_comment_id',
        ]);

        return back();
    }
}
