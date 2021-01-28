<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except('index');        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        Tag::create($request->all());
        return redirect(route('tags.index'))->with('success', 'A tag has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.create', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->slug = null;
        $tag->update([
            'name' => $request->name,
        ]);
        return redirect(route('tags.index'))->with('success', 'A tag has been updated');
    }

    public function destroy(Tag $tag)
    {
        if($tag->posts->count() > 0){
            session()->flash('error', 'Tag cannot be deleted, because it is associated to some posts');
        }else{
            $tag->delete();
            session()->flash('success', 'A tag has been deleted');
        }
        return redirect(route('tags.index')); 
    }
    

    //delete using id custom function
    // public function deleteTag(Request $request, Tag $tag)
    // {
    //    $tag->delete();
    //     return redirect(route('tags.index'))->with('success', 'A tag has been deleted'); 
    // }

}