<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;

class BlogsController extends Controller
{
    public function ShowAddBlogForm(){
        return view('admin.add-blog');
    }

    public function addBlog(Request $request){
        $title = $request->title;
        $body = $request->body;
        $imagePath = request('image')->store('uploads', 'public');
        $url = $request->url;
        $category = $request->category;
        $tags = $request->tags;
        Blog::create(['title'=>$title, 'body'=>$body, 'image'=>$imagePath, 'url'=>$url, 'category'=>$category, 'tags'=>$tags]);
        return redirect()->route('admin.posts'); 
    }

    public function showPosts(){
        $blogs = Blog::all();
        return view('users.posts', compact('blogs')); 
    }

    public function showDetails($id){
        $blog = Blog::find($id);
        $comments = $blog->comments;
        return view('users.posts-details', compact('blog', 'comments'));
    }

    public function showAdminPosts(){
        $blogs = Blog::all();
        return view('admin.admin-posts', compact('blogs'));
    }


    public function showEditForm($id){
        $blog = Blog::find($id);
        return view('admin.update-post', compact('id', 'blog'));
    }

    public function update(Request $request, $id)
    {
        $title = $request->title;
        $body = $request->body;
        $imagePath = request('image')->store('uploads', 'public');
        $url = $request->url;
        $category = $request->category;
        $tags = $request->tags;
        $blog = Blog::find($id);
        $blog->update(['title'=>$title, 'body'=>$body, 'image'=>$imagePath, 'url'=>$url, 'category'=>$category, 'tags'=>$tags]);
        return redirect()->route('admin.posts');
    }

    public function destroy($id){	
        Blog::destroy($id);
        return redirect()->route('admin.posts');
    }

    public function category($cat){
        $blogs = Blog::where('category', $cat)->get();
        return view('users.category', compact('cat', 'blogs'));
    }
}
