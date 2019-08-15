<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use App\Category;

class BlogsController extends Controller
{
    public function ShowAddBlogForm(){
        $categories = Category::all();
        return view('admin.add-blog')->withCategories($categories);
    }

    public function addBlog(Request $request){
        $title = $request->title;
        $body = $request->body;
        $imagePath = request('image')->store('uploads', 'public');
        $url = $request->url;
        $category_id = $request->category_id;
        $tags = $request->tags;
        Blog::create(['title'=>$title, 'body'=>$body, 'image'=>$imagePath, 'url'=>$url, 'category_id'=>$category_id, 'tags'=>$tags]);
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
        $categories = Category::all();
        return view('admin.update-post', compact('id', 'blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $title = $request->title;
        $body = $request->body;
        $imagePath = request('image')->store('uploads', 'public');
        $url = $request->url;
        $category_id = $request->category_id;
        $tags = $request->tags;
        $blog = Blog::find($id);
        $blog->update(['title'=>$title, 'body'=>$body, 'image'=>$imagePath, 'url'=>$url, 'category_id'=>$category_id, 'tags'=>$tags]);
        return redirect()->route('admin.posts');
    }

    public function destroy($id){	
        Blog::destroy($id);
        return redirect()->route('admin.posts');
    }

    public function category(){
        $blogs = Blog::all();
        $cat = Category::all();
        return view('users.category', compact('blogs', 'cat'))->withCategories($cat);
    }


}
