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

Route::post('login',     'Auth\MyAuthController@authenticate');
Route::post('register',  'Auth\MyAuthController@register');
Route::get( 'posts',     'PostsController@index')->middleware('auth')->name('posts');;
Route::get( 'logout',    'Auth\MyAuthController@logout')->middleware('auth');;