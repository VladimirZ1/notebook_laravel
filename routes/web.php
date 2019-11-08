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
	if (Auth::check()) {
		return redirect()->route('posts');
	}
    return view('index');
})->name('login');

Route::post( 'login',           'Auth\MyAuthController@authenticate');
Route::get( 'profile',          'Auth\MyAuthController@profile');
Route::post( 'profilesave',     'Auth\MyAuthController@profileSave');
Route::post( 'register',        'Auth\MyAuthController@register');
Route::get(  'posts',           'PostsController@index')->name('posts');
Route::get(  'logout',          'Auth\MyAuthController@logout')->middleware('auth');
Route::get(  'post/{id?}',      'PostsController@postGet')->middleware('auth')->where('id', '[0-9]+');
Route::post( 'postsave',        'PostsController@postSave')->middleware('auth');
Route::get(  'postdel/{id}',    'PostsController@postDelete')->middleware('auth')->where('id', '[0-9]+');
