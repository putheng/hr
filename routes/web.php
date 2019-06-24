<?php

use App\Models\Listing;

Route::get('/test', function(){
	$listing = Listing::find(2);

	dump($listing->package()->get());

});

Route::get('/api/routes', function(){
	$routes = collect(\Route::getRoutes())
		->map(function ($route) {
			return [
				'uri' => $route->uri(),
				'name' => $route->getName(),
				'middleware' => $route->middleware(),
				'methods' => $route->methods()[0],
			];
		});

	return response()->json(['data' => $routes]);
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');

Route::group(['middleware' => ['guest']], function(){

	Route::get('/register/employer', 'Employer\RegisterController@index')
		->name('register.employer');
	Route::post('/register/employer', 'Employer\RegisterController@store');

	Route::post('/login/employer', 'Employer\LoginController@login');
	Route::get('/login/employer', 'Employer\LoginController@index')
		->name('login.employer');

});

Route::group(['prefix' => 'api'], function(){
	Route::get('category/all', 'Admin\CategoryController@show');
	Route::get('company-type/all', 'Admin\CompanyTypeController@show');
	Route::get('education/all', 'Admin\EducationController@show');
	Route::get('experience/all', 'Admin\ExperienceController@show');
	Route::get('level/all', 'Admin\LevelController@show');
	Route::get('location/all', 'Admin\LocationController@show');
	Route::get('salary/all', 'Admin\SalaryController@show');
	Route::get('term/all', 'Admin\TermController@show');
	Route::get('industry/all', 'Admin\IndustryController@show');
	Route::get('employee-type/all', 'Admin\EmployeeTypeController@show');

});

Route::group(['middleware' => 'auth'], function(){

	Route::post('/api/listing/create/a', 'Api\ListingController@firstStep');
	Route::post('/api/listing/create/b', 'Api\ListingController@secondStep');

	Route::get('/api/filter/all', 'Api\FilterController@all');

	Route::get('/api/payment/gateway', 'Api\PaymentController@show');
	Route::post('/api/payment/gateway', 'Api\PaymentController@store');

	Route::get('/api/package/all', 'Admin\PackageController@all');
	Route::post('/api/profile/password', 'PasswordController@store');

	Route::get('/api/user/profile', 'Employer\HomeController@profile');
	Route::post('/api/user/profile', 'Employer\HomeController@store');

	Route::group(['middleware' => ['role:employer']], function(){

		Route::get('/api/listing/publish', 'Api\ListingController@publish');
		Route::get('/api/listing/unpublish', 'Api\ListingController@unpublish');
		Route::get('/api/listing/expired', 'Api\ListingController@expired');

		Route::get('/api/employer/profile', 'Employer\ProfileController@show');

		Route::post('/api/package/buy', 'Api\PackageController@buy');
		Route::get('/api/package/my', 'Api\PackageController@my');

		Route::post('/api/profile/edit', 'Api\ProfileController@store');
		
		Route::post('/api/listing/create', 'Api\ListingController@store');

		Route::post('/api/payments/deposit', 'Api\PaymentController@deposit');
		Route::get('/api/payments/transaction', 'Api\PaymentController@transaction');

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