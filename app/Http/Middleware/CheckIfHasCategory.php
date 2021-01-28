<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class CheckIfHasCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $categories = Category::all();
        if($categories->count() <= 0){
            return redirect(route('categories.create'))->with('error', 'You cannot create post because there is no category available. Create one first');
        }
        return $next($request);
    }
}
