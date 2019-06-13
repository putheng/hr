<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');

Route::group(['middleware' => ['guest'], 'prefix' => 'register', 'as' => 'register.'], function(){
	Route::get('/employer', 'Employer\RegisterController@index')->name('employer');
});

Route::group(['middleware' => 'auth'], function(){

	Route::post('/api/listing/create/a', 'Api\ListingController@firstStep');
	Route::post('/api/listing/create/b', 'Api\ListingController@secondStep');

	Route::post('/api/listing/create', 'Api\ListingController@store');
	Route::get('/api/filter/all', 'Api\FilterController@all');

	Route::get('/api/payment/gateway', 'Api\PaymentController@show');
	Route::post('/api/payment/gateway', 'Api\PaymentController@store');

	Route::get('/api/package/all', 'Admin\PackageController@all');
	Route::post('/api/profile/password', 'PasswordController@store');

	Route::get('/api/user/profile', 'Employer\HomeController@profile');
	Route::post('/api/user/profile', 'Employer\HomeController@store');
	Route::get('/api/category/all', 'Admin\CategoryController@show');
	Route::get('/api/company-type/all', 'Admin\CompanyTypeController@show');
	Route::get('/api/education/all', 'Admin\EducationController@show');
	Route::get('/api/experience/all', 'Admin\ExperienceController@show');
	Route::get('/api/level/all', 'Admin\LevelController@show');
	Route::get('/api/location/all', 'Admin\LocationController@show');
	Route::get('/api/salary/all', 'Admin\SalaryController@show');
	Route::get('/api/term/all', 'Admin\TermController@show');
	Route::get('/api/industry/all', 'Admin\IndustryController@show');
	Route::get('/api/employee-type/all', 'Admin\EmployeeTypeController@show');

	Route::group(['middleware' => ['role:employer']], function(){

		Route::post('/api/package/buy', 'Api\PackageController@buy');
		Route::post('/api/profile/edit', 'Api\ProfileController@store');

	});

	Route::group(['middleware' => ['role:admin']], function(){

		Route::post('/api/package/create', 'Admin\PackageController@store')->name('package.store');
		Route::get('/api/package/all/{package}', 'Admin\PackageController@get');
		Route::post('/api/package/all/{package}', 'Admin\PackageController@update');

		Route::post('/api/category/create', 'Admin\CategoryController@store');
		Route::post('/api/company-type/create', 'Admin\CompanyTypeController@store');
		Route::post('/api/education/create', 'Admin\EducationController@store');
		Route::post('/api/experience/create', 'Admin\ExperienceController@store');
		Route::post('/api/level/create', 'Admin\LevelController@store');
		Route::post('/api/industry/create', 'Admin\IndustryController@store');

		Route::post('/api/location/create', 'Admin\LocationController@store');
		Route::post('/api/salary/create', 'Admin\SalaryController@store');
		Route::post('/api/term/create', 'Admin\TermController@store');
		Route::post('/api/employee-type/create', 'Admin\EmployeeTypeController@store');
	});

});

/* Admin block */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function(){

	Route::get('/{vue?}', 'HomeController@index')->name('index')->where('vue', '[\/\w\.-]*');

});

/* Employer block */
Route::group(['prefix' => 'employer', 'namespace' => 'Employer', 'as' => 'employer.', 'middleware' => ['role:employer']], function(){

	Route::get('/{vue?}', 'HomeController@index')->name('index')->where('vue', '[\/\w\.-]*');

});