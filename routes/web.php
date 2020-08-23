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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return App\User::find(1)->profile;
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin Posts Controllers
Route::get('/admin/posts', 'PostController@index');
Route::get('/admin/posts/trashed', 'PostController@trashed');
Route::get('/admin/posts/create', 'PostController@create');
Route::post('/admin/posts', 'PostController@store');
Route::get('/admin/posts/{id}/edit', 'PostController@edit');
Route::put('/admin/posts/{id}', 'PostController@update');
Route::get('/admin/posts/{id}/delete', 'PostController@delete');
Route::get('/posts/kill/{id}', 'PostController@kill');
Route::get('/posts/restore/{id}', 'PostController@restore');

// Admin Categories Controllers
Route::get('/admin/post-category', 'CategoryController@index');
Route::get('/admin/post-category/create', 'CategoryController@create');
Route::post('/admin/post-category', 'CategoryController@store');
Route::get('/admin/post-category/{id}/edit', 'CategoryController@edit');
Route::put('/admin/post-category/{id}', 'CategoryController@update');
Route::get('/admin/post-category/{id}/delete', 'CategoryController@delete');

// Admin Tags Controllers
Route::get('/admin/tag', 'TagController@index');
Route::get('/admin/tag/create', 'TagController@create');
Route::post('/admin/tag', 'TagController@store');
Route::get('/admin/tag/{id}/edit', 'TagController@edit');
Route::put('/admin/tag/{id}', 'TagController@update');
Route::get('/admin/tag/{id}/delete', 'TagController@delete');

// Admin Users Controllers
Route::get('/admin/users', 'UsersController@index');
Route::get('/admin/users/create', 'UsersController@create');
Route::post('/admin/users', 'UsersController@store');
//Route::get('/user/delete/{id}', 'UsersController@destroy');
Route::get('/user/delete/{id}', 'UsersController@delkkkete');
Route::get('/admin/users/{id}/delete', 'UsersController@delete');

// Admin Users Profiles Controllers
Route::get('/admin/profiles', 'ProfilesController@index');
Route::put('/admin/profiles/update', 'ProfilesController@update');
Route::post('/admin/users', 'UsersController@store');

// Admin Permissions
Route::get('/user/admin{id}', 'UsersController@admin');
Route::get('/user/not-admin{id}', 'UsersController@not_admin');

// Admin Users Controllers
Route::get('/admin/settings', 'SettingController@index');
Route::put('/admin/settings/update', 'SettingController@update');