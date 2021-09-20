<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'title' => 'All Categories',
            'categories' => Category::latest('updated_at')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => 'Add New Category',
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
        $category = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        Category::create($category);

        return redirect('/dashboard/categories')->with('alert', [
            'type' => 'success',
            'message' => 'You have successfully added a new category!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('/dashboard/categories/edit', [
            'title' => $category->title,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $update = $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        Category::find($category->id)->update($update);

        return redirect('/dashboard/categories')->with('alert', [
            'type' => 'success',
            'message' => 'You have successfully updated a category!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('alert', [
            'type' => 'warning',
            'message' => 'You have successfully deleted a category.',
        ]);
    }
}
