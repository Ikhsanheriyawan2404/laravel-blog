<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', [
            'title' => 'Kategori Post',
            'categories' => Category::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', [
            'title' => 'Create new Category',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Category $category)
    {
        request()->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'thumbnail' => 'required',
            'is_published' => 'required',
        ]);

        Category::create([
            'user_id' => Auth::id(),
            'name' => request('name'),
            'slug' => str_slug(request('name')),
            'thumbnail' => request('thumbnail'),
            'is_published' => request('is_published'),
        ]);

        // return dd($categories);
        return redirect()->route('categories.index')->with('success', 'Category was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => 'Edit Category',
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        request()->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'thumbnail' => 'required',
            'is_published' => 'required',
        ]);

        $category->updated([
            'user_id' => Auth::id(),
            'name' => request('name'),
            'slug' => str_slug(request('name')),
            'thumbnail' => request('thumbnail'),
            'is_published' => request('is_published'),
        ]);
        return dd($category);
        // return redirect()->route('categories.index')->with('success', 'Category was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category was deleted');

    }
}
