<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::orderBy('role', 'desc')->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user){
        return view('users.show', compact('user'));
    }
   
}
