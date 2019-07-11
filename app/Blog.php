<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'body', 'image', 'url', 'category', 'tags', ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
