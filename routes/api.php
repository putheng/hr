<?php

Route::group(['namespace' => 'Api'], function(){

	Route::post('register', 'RegisterController@register');

	Route::post('/login', 'LoginController@login');
	Route::post('/logout', 'LogoutController@logout');

	Route::get('/me', 'MeController@me');

});
