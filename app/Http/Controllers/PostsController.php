<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Tag;

class PostsController extends Controller
{

    public function __construct()
    {
       $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::orderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create')
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $image = $request->image->store('posts');

        $post = Post::create( [
            'title' => $request->title,
            'desc' => $request->desc,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        session()->flash('success','Post created successfully');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'desc', 'published_at', 'content', 'user_id']);

        if($request->hasFile('image')){
            $image = $request->image->store('posts');

            $post->deleteImage();

            $data['image'] = $image;
        }

        if($request->tags) {
            $post->tags()->sync($request->tags);
        }

        $post->update($data);

        session()->flash('success','Post updated successfully');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->find($id);

        if ($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();
        } else {
            $post->delete();
        }

        session()->flash('success', 'Post deleted successfully');

        return redirect(route('posts.index'));
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);

        $post->restore();

        session()->flash('success', 'Post restore successfully');

        return redirect()->back();
    }

    public function category(Category $category)
    {
        return view('blog.category')->with('category', $category);
    }

    public function tag(Tag $tag)
    {
        return view('blog.tag')->with('tag', $tag);
    }
}
