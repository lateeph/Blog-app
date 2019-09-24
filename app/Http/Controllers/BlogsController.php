<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use App\Category;
use App\Tag;


class BlogsController extends Controller
{
    public function ShowAddBlogForm(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.add-blog', compact('categories', 'tags'));
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
        return redirect()->route('admin.posts', $blog->id); 
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
        $tags = Tag::all();
        return view('admin.update-post', compact('id', 'blog', 'categories', 'tags'));
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
        
        return redirect()->route('admin.posts', $blog->id);
    }

    public function destroy($id){
        $blog = Blog::find($id);
        $blog->tags()->detach();
        $blog->delete();
        return redirect()->route('admin.posts');
    }

    public function category(){
        $blogs = Blog::all();
        $cat = Category::all();
        return view('users.category', compact('blogs', 'cat'))->withCategories($cat);
    }


}
