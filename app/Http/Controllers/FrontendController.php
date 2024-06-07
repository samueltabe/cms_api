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
        $search = request()->query('search');
        if($search){
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        } else{
            $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        }
        return view('frontend.index')
        ->with('posts', $posts)
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
