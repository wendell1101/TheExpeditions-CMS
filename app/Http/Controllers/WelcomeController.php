<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        if($search){
           $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(4);
        }else{
            $posts = Post::simplePaginate(2);
        }
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => Post::searched()->simplePaginate(4),
        ];

        return view('welcome')->with($data);
    }
}
