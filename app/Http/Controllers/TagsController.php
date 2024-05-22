<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {

        Tag::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag created successfully!');

        return redirect(route('tags.index'));
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

    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Tag $tag)
    {
        $data = $request->only(['name']);


        $tag->update($data);

        session()->flash('success','Tag updated successfully');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $tag = Tag::find($id);
        if($tag->posts->count() > 0) {
            session()->flash('error', 'Tag cannot be deleted because it is associated to some posts ');
            return redirect()->back();
        }

            $tag->delete();

        session()->flash('success', 'Tag deleted successfully');

        return redirect(route('tags.index'));
    }
}
