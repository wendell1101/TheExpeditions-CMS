<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable, SoftDeletes;


    
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title', 'slug', 'description', 'content', 'published_at', 'image', 'category_id', 'user_id',
    ];

    public function deleteExistingImage(){
        Storage::delete('public/'.$this->image);   
    }

    //make the default key to slug
    public function getRoutekeyName(){
        return 'slug';
    }

    // check if post has tag
    public function hasTag($tagId){
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function scopeSearched($query){
        $search = request()->query('search');

        if(!$search){
            return $query->published();
        }

        return $query->published()->where('title', 'LIKE', "%{$search}%");
    }

    public function scopePublished($query){
        return $query->where('published_at', '<=', now());
    }


    // Relations
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
