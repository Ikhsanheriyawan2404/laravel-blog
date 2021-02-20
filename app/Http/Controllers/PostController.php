<?php

namespace App\Http\Controllers;

use App\{Post, Category};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'no' => 1,
            'title' => 'Post List',
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'title' => 'Create new Post',
            'categories' => Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'thumbnail' => 'required',
            'title' => 'required|unique:posts,title,',
            'details' => 'required',
            'category' => 'required',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'thumbnail' => request('thumbnail'),
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'sub_title' => request('sub_title'),
            'details' => request('details'),
            'is_published' => request('is_published'),
            'post_type' => 'post',
        ]);

        $post->categories()->sync(request('category'));

        return redirect()->route('posts.index')->with('success', 'New Post was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'title' => 'Edit Post',
            'categories' => Category::get(),
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        request()->validate([
            'thumbnail' => 'required',
            'title' => 'required|unique:posts,title,' . $post->id,
            'details' => 'required',
            'category' => 'required',
        ]);

        $post->update([
            'user_id' => Auth::id(),
            'thumbnail' => request('thumbnail'),
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'sub_title' => request('sub_title'),
            'details' => request('details'),
            'is_published' => request('is_published'),
            'post_type' => 'post',
        ]);

        $post->categories()->sync(request('category'));
        return redirect()->route('posts.index')->with('success', 'Post was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post was delete');
    }
}
