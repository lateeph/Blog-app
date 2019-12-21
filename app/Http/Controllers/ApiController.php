<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use App\Category;
use App\Tag;


class ApiController extends Controller
{
    public function ShowAddBlogForm(){
        $categories = Category::all();
        $tags = Tag::all();
        return [$categories, $tags];
    }

    public function addBlog(Request $request){
        $title = $request->title;
        $body = $request->body;
        $imagePath = request('image')->store('uploads', 'public');
        $url = $request->url;
        $category_id = $request->category_id;
        $tags = $request->tags;
        $blog = Blog::create(['title'=>$title, 'body'=>$body, 'image'=>$imagePath, 'url'=>$url, 'category_id'=>$category_id]);
        $blog->tags()->sync($request->tags, false);
        return $blog;
    }

    public function showPosts(){
        return Blog::all();      
    }

    public function showDetails($id){
        $blog = Blog::find($id);
        $comments = $blog->comments;
        return $blog;
    }

    public function showAdminPosts(){
        return Blog::all();
    }


    public function showEditForm($id){
        $blog = Blog::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return [$blog, $categories, $tags];
    }

    public function update(Request $request, $id)
    {
        $title = $request->title;
        $body = $request->body;
        $imagePath = request('image')->store('uploads', 'public');
        $url = $request->url;
        $category_id = $request->category_id;
        $blog = Blog::find($id);
        $blog->update(['title'=>$title, 'body'=>$body, 'image'=>$imagePath, 'url'=>$url, 'category_id'=>$category_id]);
        if (isset($request->tags)) {
            $blog->tags()->sync($request->tags);
        } else {
            $blog->tags()->sync(array());
        }
        
        return $blog;
    }

    public function destroy($id){
        $blog = Blog::find($id);
        $blog->tags()->detach();
        $blog->delete();
        return 204;
    }

    public function category($cat_id){
        $blogs = Blog::where('category_id',$cat_id)->get(); 
        // $cat = Category::all();
        //$category = Blog::has('blogs')->get();
        //return view('users.category', compact('category'));
        
       
        return $blogs;
    }


   //CategoryApi
    

}
