<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-blog', 'ApiController@ShowAddBlogForm');
Route::post('/add', 'ApiController@addBlog'); 
Route::get('/admin-posts', 'ApiController@showAdminPosts');
Route::get('/posts/edit/{id}', 'ApiController@showEditForm');
Route::put('/posts/update/{id}', 'ApiController@update');
Route::delete('/posts/{id}', 'ApiController@destroy');
Route::get('/category/{id}', 'ApiController@category');
Route::resource('categories', 'ApiCategoryController', ['except' => ['create']]);
Route::resource('tags', 'ApiController', ['except' => ['create']]);
Route::get('/category_create', 'ApiCategoryController@index');
Route::get('/add-tag', 'ApiTagController@index');
Route::post('/store', 'ApiCategoryController@store');


Route::post('/save-comment/{id}', 'ApiController@saveComment');
Route::get('/posts', 'ApiController@showPosts');
Route::get('/posts/details/{id}', 'ApiController@showDetails');
