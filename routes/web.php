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

Auth::routes();


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
	Route::post('/post/store', ['uses'=>'PostController@store', 'as'=>'post.store']);
	Route::get('/post/create', ['uses'=>'PostController@create', 'as'=>'post.create']);
	Route::get('/home', ['uses'=>'HomeController@index', 'as'=>'home']);
	Route::get('/category/create', ['uses'=>'CategoriesController@create', 'as'=>'category.create']);
	Route::post('/category/store', ['uses'=>'CategoriesController@store', 'as'=>'category.store']);
	Route::get('/categories/index', ['uses'=>'CategoriesController@index', 'as'=>'categories.index']);
	Route::get('/category/edit/{id}', ['uses'=>'CategoriesController@edit', 'as'=>'category.edit']);
	Route::get('/category/destroy/{id}', ['uses'=>'CategoriesController@destroy', 'as'=>'category.destroy']);
	Route::post('/category/update/{id}', ['uses'=>'CategoriesController@update', 'as'=>'category.update']);



});

/** Remove this part below */
Route::get('post/me', ['uses' => 'PostController@feeding', 'as'=>'post.me']);


