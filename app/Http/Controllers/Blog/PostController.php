<?php

namespace App\Http\Controllers\Blog;

use App\Post;
use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->searched()->simplePaginate(4);
        $categories = Category::all();
        $tags = Tag::all();
        return view('blog.category',compact('category','categories','tags', 'posts'));
    }
    public function tag(Tag $tag)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = $tag->posts()->searched()->simplePaginate(4);
        return view('blog.tag',compact('tag','categories','tags', 'posts'));
    }
}
