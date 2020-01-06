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

Route::group(['middleware' =>"auth" ],function(){
    Route::get('/posts', 'PostController@index');
    Route::get('/','PostController@index' );

    Route::get('/posts/create', 'PostController@create');

    Route::post('/posts', 'PostController@store');

    Route::post('/posts/{id}', 'commentController@store');

    Route::get('/posts/ajax/{id}', 'AjaxController@show');

    Route::get('/posts/{id}', 'PostController@show')->name('posts.post');

    Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit');

    Route::put('/posts/{id}', 'PostController@update');

    Route::delete('/posts/{id}', 'PostController@destroy');
    Route::delete('/posts/softDelete/{id}', 'PostController@softDelete');
    Route::get('/posts/restoreDeleted/{id}', 'PostController@restoreDeleted');

    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')
    ->name('login.provider')
    ->where('driver', implode('|', config('auth.socialite.drivers')));
    Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')
    ->name('login.callback')
    ->where('driver', implode('|', config('auth.socialite.drivers')));