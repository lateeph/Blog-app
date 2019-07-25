<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-blog', 'BlogsController@ShowAddBlogForm')->name('blog.add');
Route::post('/add', 'BlogsController@addBlog')->name('add'); 
Route::get('/posts', 'BlogsController@showPosts')->name('posts');
Route::get('/posts/details/{id}', 'BlogsController@showDetails')->name('posts.details');
Route::post('/save-comment/{id}', 'CommentsController@saveComment')->name('comments.save');
Route::get('/admin-posts', 'BlogsController@showAdminPosts')->name('admin.posts');
Route::get('/posts/edit/{id}', 'BlogsController@showEditForm')->name('posts.edit');
Route::put('/posts/update/{id}', 'BlogsController@update')->name('admin-posts.update');
Route::delete('/posts/{id}', 'BlogsController@destroy')->name('posts.delete');
Route::get('/category', 'BlogsController@category')->name('category');
Route::post('/store', 'BlogsController@store')->name('category.store');
