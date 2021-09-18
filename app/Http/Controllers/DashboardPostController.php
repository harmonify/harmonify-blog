<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Utilities\DashboardPostUtilities as Utilities;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Gate;

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
            'posts' => Post::where('user_id', auth()->user()->id)
                ->with('category')
                ->latest('updated_at')
                ->paginate(10),
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
            'excerpt' => Utilities::generateExcerpt($post['body']),
            'user_id' => Utilities::getAuthorId(),
            'thumbnail' => Utilities::storeThumbnail($request->thumbnail),
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
        if (! Gate::allows('show', $post)) {
            abort(403);
        }

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
        if (! Gate::allows('authorize', $post)) {
            abort(403);
        }
        
        return view('dashboard/posts/edit', [
            'title' => $post->title,
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if (! Gate::allows('update', $post)) {
            abort(403);
        }

        $update = $request->validated();

        $update = collect($update)->merge([
            'excerpt' => Utilities::generateExcerpt($update['body']),
            'user_id' => Utilities::getAuthorId(),
            'thumbnail' => Utilities::updateThumbnail($request->thumbnail),
        ])->toArray();

        Post::find($post->id)->update($update);

        return redirect('/dashboard/posts')->with('alert', [
            'type' => 'success',
            'message' => 'You updated a post!'
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
        if (! Gate::allows('update-post', $post)) {
            abort(403);
        }
        
        Utilities::deleteThumbnail($post->thumbnail);

        Post::destroy($post->id);

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
