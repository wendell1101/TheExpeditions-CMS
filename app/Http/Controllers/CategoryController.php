<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect(route('categories.index'))->with('success', 'A category has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.create', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->slug = null;
        $category->update([
            'name' => $request->name,
        ]);
        return redirect(route('categories.index'))->with('success', 'A category has been updated');
    }

    
    public function destroy(Category $category)
    {
        if($category->posts->count() > 0){
            session()->flash('error', 'Category cannot be deleted, because it is associated to some posts');
        }else{
            $category->delete();
            session()->flash('success', 'A category has been deleted');
        }
        return redirect(route('categories.index')); 
    }
    //delete using id custom function
    // public function deleteCategory(Request $request, Category $category)
    // {
    //    $category->delete();
    //     return redirect(route('categories.index'))->with('success', 'A category has been deleted'); 
    // }
}
