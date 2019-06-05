<?php

Route::get('/test', function(){
	return Carbon\Carbon::now();
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Admin block */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function(){

	Route::get('/', 'HomeController@index')->name('index');

	Route::post('/api/package/create', 'PackageController@store')->name('package.store');


	Route::get('/api/user', 'AuthController@index')->name('user');
});