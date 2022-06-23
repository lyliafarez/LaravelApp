<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostLikeController;


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

Route::get('/',[MainController::class,'home'])->name('home');
Route::get('/articles',[MainController::class,'index'])->name('articles');
Route::get('/posts',[MainController::class,'showPosts'])->name('Allposts');
Route::get('/post/{post}',[MainController::class,'showPost'])->name('post');
Route::get('/articles/{article:slug}',[MainController::class,'show'])->name('article');
Auth::routes();
//Route::resource('posts',PostController::class);
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::resource('articles',ArticleController::class);
    Route::resource('users',UserController::class);
    Route::resource('posts',PostController::class);
});


Route::post('/posts/{post}/like',[PostLikeController::class,'store'])->name('post.like');
Route::post('/posts/{post}/unlike',[PostLikeController::class,'destroy'])->name('post.unlike');

Route::post('/posts/{post}/comment',[CommentController::class,'store'])->name('post.comment');




/* Route::get('/env',function(){
    dd(env('DB_DATABASE'));
});
 

 Route::get('/article/{id}',function($id){
     return 'article' . $id;
 });

 Route::prefix('admin')->group(function(){
     Route::get('users',function(){
         return response('lylia');
     });
 });*/


