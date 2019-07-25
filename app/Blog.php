<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'body', 'image', 'url', 'category_id', 'tags', ];

    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('created_at', 'DESC');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
}
