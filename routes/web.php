<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name('welcome.index');
Route::get('/blog/posts/{post:slug}', [PostController::class, 'show'])->name('blog.show');
Route::get('/blog/categories/{category:slug}', [PostController::class, 'category'])->name('blog.category');
Route::get('/blog/tags/{tag:slug}', [PostController::class, 'tag'])->name('blog.tag');
    

Route::middleware('auth')->group(function(){
    Route::get('/admin', 'AdminController@index')->name('admin.index');


    Route::resource('users', 'UserController')->scoped(['user' => 'slug']);
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('tags', 'TagController');

    Route::delete('/categories/{category}/delete', 'CategoryController@deleteCategory')->name('categories.delete');
    Route::delete('/tags/{tag}/delete', 'TagController@deleteTag')->name('tags.delete');
    Route::put('/post-restore/{post:slug}', 'PostController@restore')->name('post.restore');
    Route::get('/recycled-posts', 'PostController@recycledPosts')->name('recycled-post.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
