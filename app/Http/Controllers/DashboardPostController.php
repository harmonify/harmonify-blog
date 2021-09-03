<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Requests\StorePostRequest;
use App\Utilities\DashboardPostUtilities;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/dashboard/posts/index', [
            'title' => 'My Posts',
            'posts' => Post::where('user_id', auth()->user()->id)->with('category')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/posts/create', [
            'title' => 'Create New Post',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $post = $request->validated();

        $post = collect($post)->merge([
            'excerpt' => DashboardPostUtilities::generateExcerpt($post['body']),
            'user_id' => auth()->user()->id,
        ])->toArray();

        Post::create($post);

        return redirect('/dashboard/posts')->with('alert', [
            'type' => 'success',
            'message' => 'You successfully added a new post!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('/dashboard/posts/show', [
            'title' => $post->title,
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        // The incoming request is valid...
        // Retrieve the validated input data...
        $updatePost = $request->validated();

        $updatePost = collect($updatePost)->merge([
            'excerpt' => DashboardPostUtilities::generateExcerpt($post['body']),
            'user_id' => auth()->user()->id,
        ])->toArray();

        Post::where('slug', $post->slug)->update([
            $request
        ]);

        return redirect('/dashboard/posts')->with('alert', [
            'type' => 'success',
            'message' => 'You successfully updated a post!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::where('slug', $post->slug)->delete();

        return redirect('/dashboard/posts')->with('alert', [
            'type' => 'warning',
            'message' => 'You successfully deleted a post.',
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

}
