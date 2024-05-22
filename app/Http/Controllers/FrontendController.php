<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index')
        ->with('posts', Post::orderBy('created_at', 'desc')->get())
        ->with('tags', Tag::all())
        ->with('categories', Category::all());
    }


    public function single(Post $post)
    {
        return view('frontend.single')->with('post', $post)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }
}
