<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
            'posts' => Post::all(),
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ];
        return view('admin.index')->with($data);
    }
}
