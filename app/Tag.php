<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function blogs()
    {
        return $this->belongsToMany('App\Blog', 'blog_tag', 'tag_id', 'blog_id');
    }
}
