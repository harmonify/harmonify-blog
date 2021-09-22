<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Thumbnail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ThumbnailResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.thumbnails.index', [
            'title' => 'All Thumbnails',
            'thumbnails' => Thumbnail::latest('updated_at')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.thumbnails.create', [
            'title' => 'Add New Thumbnail',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thumbnail = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        Thumbnail::create($thumbnail);

        return redirect('/dashboard/thumbnails')->with('alert', [
            'type' => 'success',
            'message' => 'You have successfully added a new thumbnail!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function show(Thumbnail $thumbnail)
    {
         return view('dashboard.thumbnails.show', [
            'title' => "Thumbnail",
            'thumbnail' => $thumbnail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function edit(Thumbnail $thumbnail)
    {
        return view('/dashboard/thumbnails/edit', [
            'title' => "Edit Thumbnail",
            'thumbnail' => $thumbnail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thumbnail $thumbnail)
    {
        $update = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        Thumbnail::find($thumbnail->id)->update($update);

        return redirect('/dashboard/thumbnails')->with('alert', [
            'type' => 'success',
            'message' => 'You have successfully updated a thumbnail!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thumbnail  $thumbnail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thumbnail $thumbnail)
    {
        Thumbnail::destroy($thumbnail->id);

        return redirect('/dashboard/thumbnails')->with('alert', [
            'type' => 'warning',
            'message' => 'You have successfully deleted a thumbnail.',
        ]);
    }
}
