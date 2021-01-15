<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get("/email", function (){
   return new \App\Mail\NewUserWelcomeEmail();
});

Route::post("/follow/{user}", "FollowsController@store");

Route::get('/profile/{userId}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{userId}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{userId}', 'ProfilesController@update')->name('profile.update');

Route::get('/', 'PostsController@index');
Route::get('/post/create', 'PostsController@create');
Route::get('/post/{postId}', 'PostsController@show');
Route::post('post', 'PostsController@store')->name('posts.store');

Route::get('/sabiranje', function (){
   return view('window.sabiranje');
});
Route::post('/sabiranje', 'SabiranjeController@sabiranje');



