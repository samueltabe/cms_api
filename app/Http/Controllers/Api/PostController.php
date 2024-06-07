<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function getpost()
    {
        // $post = Post::all();
        // return ($post);

        $search = request()->query('search');
        if($search){
            $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        } else{
            $posts = Post::orderBy('created_at', 'desc')->with(['category', 'tags', 'user'])->get();
        }
        return $posts;

    }

        public function showBySlug($id)
    {
        $post = Post::where('id', $id)->with(['category', 'tags', 'user'])->firstOrFail();
        return response()->json($post);
    }
}
