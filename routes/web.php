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
Route::view('/dashboard','admin.dashboard');
Route::get('/post','PostController@index');
Route::get('/add-category','CategorieController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Category route
Route::post('/addCategory','CategorieController@store');
Route::get('/editCategory/{id}','CategorieController@edit');
Route::post('/updateCategory/{id}','CategorieController@update');
Route::get('/category','CategorieController@show');
Route::get('/category/{id}','CategorieController@destroy');


//Post route
Route::post('/addPost','PostController@store');
Route::get('/editPost/{id}','PostController@edit');
Route::post('/updatePost/{id}','PostController@update');
Route::get('/post','PostController@show');
Route::get('/post/{id}','PostController@destroy');
