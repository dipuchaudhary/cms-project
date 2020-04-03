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

Route::get('/','WelcomeController@index')->name('welcome');

Route::get('blog/posts/{post}',[\App\Http\Controllers\blog\PostsController::class,'show'])->name('blog.show');

Route::get('blog/categories/{category}',[\App\Http\Controllers\blog\PostsController::class,'category'])->name('blog.category');

Route::get('blog/tags/{tag}',[\App\Http\Controllers\blog\PostsController::class,'tag'])->name('blog.tag');

Auth::routes();

Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories','CategoryController');

    Route::resource('posts','PostsController');

    Route::resource('tags','TagsController');

    Route::get('trashed-posts','PostsController@trashed')->name('trashed-posts.index');

    Route::put('restore/{post}','PostsController@restore')->name('restore-posts');

});

Route::middleware(['auth','admin'])->group(function (){
    Route::get('users','UsersController@index')->name('users.index');
    Route::get('users/edit-profile','UsersController@edit')->name('users.edit-profile');
    Route::put('users/{user}/update-profile','UsersController@update')->name('users.update-profile');
    Route::post('users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');
});

