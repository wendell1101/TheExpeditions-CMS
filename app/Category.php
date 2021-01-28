<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use Sluggable;  

    protected $fillable = [
        'name', 'slug',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // relations

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
