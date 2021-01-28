<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('hasCategory')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $image = $request->image->store('post_images', 'public');
        
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        return redirect(route('posts.index'))->with('success', 'A post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
       $post->slug = null;
        $data = $request->only(['title', 'description', 'content', 'published_at']);
        if($request->hasFile('image')){
            $post->deleteExistingImage();    
            $image = $request->image->store('post_images', 'public');
            $data['image'] = $image;
        }
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $post->update($data);

        return redirect(route('posts.index'))->with('success', 'A post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $slug)
    {
        $post = Post::withTrashed()->where('slug',$slug)->firstOrFail();
        if($post->trashed()){
            $post->deleteExistingImage();
            $post->forceDelete(); // force delete
            $request->session()->flash('success', 'A post has been deleted permanently');
        }else{
            $post->delete(); // soft delete
            $request->session()->flash('success', 'A post has been moved to the recycled posts');
        }
        return redirect(route('posts.index'));
    }

    public function recycledPosts(){
        $posts = Post::onlyTrashed()->get();
        return view('posts.index',compact('posts'));
    }

    // restore

    public function restore($slug)
    {
        $post = Post::withTrashed()->where('slug', $slug)->firstOrFail();
        $post->restore();
        return redirect()->back()->with('success', 'A post has been restored');
    }
}
