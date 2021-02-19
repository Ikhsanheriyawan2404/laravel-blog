<?php

namespace App\Http\Controllers;

use App\{Post, Category};

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index', [
            'title' => 'Halaman Utama',
            'posts' => Post::latest()->where('is_published', '1')->where('post_type', 'post')->paginate(10),
            'categories' => Category::latest()->get(),
        ]);
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->where('post_type', 'post')->where('is_published', '1')->first();
        if ($post) {
            return view('website.post', [
                'title' => 'Post',
                'post' => $post,
            ]);
        } else {
            return \Response::view('website.errors.404', [], 404);
        }
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->where('is_published', '1')->first();
        if ($category) {
            $posts = $category->posts()->latest()->where('is_published', '1')->paginate(4);
            return view('website.category', [
                'title' => 'Category : ' . $category->slug ,
                'category' => $category,
                'posts' => $posts,
            ]);
        } else {
            return \Response::view('website.errors.404', [], 404);
        }
    }
}
