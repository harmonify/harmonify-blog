<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;

class PostCommentController extends Controller
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
