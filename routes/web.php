<?php

Route::get('/test', function(){
	dd(App\User::find(1)->profile);
	
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){

	Route::get('/users/make-admin/{id}', ['uses'=>'UsersController@makeAdmin', 'as'=>'users.admin']);
	Route::get('/users/not-admin/{id}', ['uses'=>'UsersController@notAdmin', 'as'=>'users.not.admin']);
	Route::post('/users/store', ['uses'=>'UsersController@store', 'as'=>'users.store']);
	Route::get('/users/create', ['uses'=>'UsersController@create', 'as'=>'users.create']);
	Route::get('/users', ['uses'=>'UsersController@index', 'as'=>'users']);
	Route::post('/tag/update/{id}', ['uses'=>'TagController@update', 'as'=>'tag.update']);
	Route::get('/tag/destroy/{id}', ['uses'=>'TagController@destroy', 'as'=>'tag.destroy']);
	Route::get('/tag/edit/{id}', ['uses'=>'TagController@edit', 'as'=>'tag.edit']);
	Route::post('/tag/store', ['uses'=>'TagController@store', 'as'=>'tag.store']);
	Route::get('/tag/create', ['uses'=>'TagController@create', 'as'=>'tag.create']);
	Route::get('/tag/index', ['uses'=>'TagController@index', 'as'=>'tag.index']);
	Route::post('/post/update{id}', ['uses'=>'PostController@update', 'as'=>'post.update']);
	Route::get('/post/edit/{id}', ['uses'=>'PostController@edit', 'as'=>'post.edit']);
	Route::get('/post/kill/{id}', ['uses'=>'PostController@kill', 'as'=>'post.kill']);
	Route::get('/post/restore/{id}', ['uses'=>'PostController@restore', 'as'=>'post.restore']);
	Route::get('/post/trash', ['uses'=>'PostController@trash', 'as'=>'post.trash']);
	Route::get('/posts', ['uses'=>'PostController@index', 'as'=>'posts']);
	Route::post('/post/store', ['uses'=>'PostController@store', 'as'=>'post.store']);
	Route::get('/post/create', ['uses'=>'PostController@create', 'as'=>'post.create']);
	Route::get('/post/delete/{id}', ['uses'=>'PostController@destroy', 'as'=>'post.delete']);
	Route::get('/home', ['uses'=>'HomeController@index', 'as'=>'home']);
	Route::get('/category/create', ['uses'=>'CategoriesController@create', 'as'=>'category.create']);
	Route::post('/category/store', ['uses'=>'CategoriesController@store', 'as'=>'category.store']);
	Route::get('/categories/index', ['uses'=>'CategoriesController@index', 'as'=>'categories.index']);
	Route::get('/category/edit/{id}', ['uses'=>'CategoriesController@edit', 'as'=>'category.edit']);
	Route::get('/category/destroy/{id}', ['uses'=>'CategoriesController@destroy', 'as'=>'category.destroy']);
	Route::post('/category/update/{id}', ['uses'=>'CategoriesController@update', 'as'=>'category.update']);


});


