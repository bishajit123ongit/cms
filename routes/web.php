<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostsController;
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

Route::get('/locale/{locale}',function($locale){
  Session::put('locale',$locale);
  return redirect()->back();
  /*return view('welcome');*/
});

Route::get('/','WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}', [PostsController::class,'show'])->name('blog.show');
Route::get('blog/categories/{category}', [PostsController::class,'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class,'tag'])->name('blog.tag');


Auth::routes();



Route::middleware(['auth'])->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('categories','CategoriesController');
	Route::resource('tags','TagsController');
	Route::resource('posts','PostsController');
	Route::get('trashed-post','PostsController@trashed')->name('posts-trashed.index');
	Route::PUT('restore-post/{post}','PostsController@restore')->name('posts.restore');
  Route::get('dashboard','DashboardController@index')->name('dashboard.index');
});

Route::middleware(['auth','admin'])->group(function(){
  Route::get('users','UsersController@Index')->name('users.index');
  Route::get('users/chart','ChartController@userChart')->name('users.chart');
  Route::put('Update/Users','UsersController@update')->name('users.update-profile');
  Route::post('users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');
  Route::get('users/profile','UsersController@edit')->name('users.edit-profile');
});



