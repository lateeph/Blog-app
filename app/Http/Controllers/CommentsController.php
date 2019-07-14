<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;

class CommentsController extends Controller
{

  
   public function saveComment(Request $request, $id){
        $name = $request->name;
        $comment = $request->comment;
        $blog = Blog::find($id);
        $blog->comments()->create(['name'=>$name, 'comment'=>$comment]);
        return redirect()->route('posts.details', $id);
   }
}
