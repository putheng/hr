<?php

use Illuminate\Support\Facades\Artisan;

Route::get('/language/switch/{locale}', 'LanguageController@switch');

Route::get('/api/routes', function(){
	$routes = collect(\Route::getRoutes())
		->map(function ($route) {
			return [
				'uri' => '/'. $route->uri(),
				'name' => $route->getName(),
				'middleware' => $route->middleware(),
				'methods' => $route->methods()[0],
			];
		});

	return response()->json(['data' => $routes]);
});

Route::get('/foo', function () {
	$exitCode = Artisan::call('migrate:refresh', [
	    '--force' => true,
	]);

	dd($exitCode);
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/about', 'HomeController@about')->name('home.about');
Route::get('/question', 'HomeController@qa')->name('home.qa');
Route::get('/tip', 'HomeController@tip')->name('home.tip');
Route::get('/tip/{blog}', 'BlogController@show')->name('tip.show');
Route::get('/services', 'HomeController@basic')->name('home.services');
Route::get('/urgent-job', 'HomeController@urgent')->name('home.urgent');
Route::get('/featured-employers', 'HomeController@featured')->name('home.featured');
Route::get('/recruitment-agencies', 'HomeController@recruitment')->name('home.recruitment');
Route::get('/banner-advertising', 'HomeController@banner')->name('home.banner');
Route::get('/contact-us', 'HomeController@contact')->name('home.contact');
Route::get('/package/{package}', 'HomeController@packages')->name('home.package');

Route::get('/filter', 'ListingController@filter')->name('home.filter');
Route::get('/listing/{listing}', 'ListingController@show')->name('listing.show');

Route::get('/listings', 'ListingController@index')->name('listing.index');

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

	Route::get('resume/show', 'Api\ResumeController@show');
	Route::get('resume/show/my', 'Api\ResumeController@my');
	Route::post('resume/purchase', 'Api\ResumeController@purchase');

});

Route::group(['middleware' => 'auth'], function(){
	Route::get('/resume/view/{resume}', 'Seeker\ResumeController@view')->name('resume.view');

	Route::get('/file/download/{resume}', 'Seeker\ResumeController@download');

	Route::post('/api/files/upload', 'Api\FileController@upload');

	Route::post('/api/seeker/avatar', 'Api\AvatarController@avatar');
	Route::post('/api/seeker/avatar/company', 'Api\AvatarController@store');

	Route::post('/api/listing/create/a', 'Api\ListingController@firstStep');
	Route::post('/api/listing/create/b', 'Api\ListingController@secondStep');
	Route::post('/api/listing/create/c', 'Api\ListingController@paymentStep');
	Route::post('/api/listing/create/save', 'Api\ListingController@save');

	Route::get('/api/filter/all', 'Api\FilterController@all');

	Route::get('/api/package/all', 'Admin\PackageController@all');
	Route::post('/api/profile/password', 'PasswordController@store');

	Route::get('/api/user/profile', 'Employer\HomeController@profile');
	Route::post('/api/user/profile', 'Employer\HomeController@store');

	Route::group(['middleware' => ['role:jobseeker']], function(){
		Route::get('/api/seeker/listings/favorite', 'Seeker\ListingController@favorite');
		Route::post('/api/seeker/listings/favorite/remove', 'Seeker\ListingController@remove');

		Route::get('/listing/favorite/{listing}/save', 'Seeker\FavoriteController@save')->name('listing.favorite');
		Route::get('/listing/favorite/{listing}/remove', 'Seeker\FavoriteController@remove')->name('listing.favorite.remove');

		Route::get('/api/seeker/profile', 'Seeker\ProfileController@profile');
		Route::post('/api/seeker/profile', 'Seeker\ProfileController@store');

		Route::post('/api/resume/create', 'Seeker\ResumeController@store');
		Route::post('/api/resume/upload', 'Seeker\ResumeController@upload');

		Route::get('/api/resume/my', 'Seeker\ResumeController@show');
		Route::get('/api/resume/my/{resume}', 'Seeker\ResumeController@get');
		Route::post('/api/resume/edit/{resume}', 'Seeker\ResumeController@storeUpdate');
		Route::post('/api/resume/destroy', 'Seeker\ResumeController@destroy');

	});

	Route::group(['middleware' => ['role:employer']], function(){

		Route::get('/api/payment/gateway/show', 'Api\PaymentController@show');

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

		Route::post('/api/admin/job/create', 'Admin\ListingController@store');

		Route::get('/api/admin/seeker', 'Api\ResumeController@seeker');
		Route::get('/api/admin/resume', 'Api\ResumeController@adminShow');

		Route::get('/api/admin/employers', 'Api\EmployerController@get');
		Route::post('/api/admin/employer/featured', 'Api\EmployerController@featured');
		Route::post('/api/admin/employer/remove-featured', 'Api\EmployerController@removeFeatured');
		Route::get('/api/admin/employer/featured', 'Api\EmployerController@getFeatured');
		Route::get('/api/admin/employer/blocked', 'Api\EmployerController@blocked');
		Route::post('/api/admin/employer/blocked', 'Api\EmployerController@storeBlocked');
		Route::post('/api/admin/employer/unblock', 'Api\EmployerController@unblock');

		Route::get('/api/admin/post-type', 'Api\PostController@type');
		Route::post('/api/admin/page/create', 'Api\PostController@store');
		Route::get('/api/admin/page/show', 'Api\PostController@show');
		Route::post('/api/admin/page/delete', 'Api\PostController@destroy');

		Route::post('/api/admin/blog', 'Api\BlogController@store');
		Route::get('/api/admin/blog', 'Api\BlogController@show');
		Route::post('/api/admin/blog/delete', 'Api\BlogController@destroy');

		Route::post('/api/admin/question', 'Api\QuestionController@store');
		Route::get('/api/admin/question', 'Api\QuestionController@all');
		Route::post('/api/admin/question/delete', 'Api\QuestionController@destroy');
		Route::post('/api/admin/question/edit', 'Api\QuestionController@edit');

		Route::post('/api/advertising/upload', 'Api\AdvertisingController@upload');
		Route::get('/api/advertising/show', 'Api\AdvertisingController@show');
		Route::post('/api/advertising/delete', 'Api\AdvertisingController@desroy');

		Route::post('/api/payment/approve', 'Api\PaymentController@approve');
		Route::post('/api/payment/reject', 'Api\PaymentController@reject');

		Route::get('/api/admin/listings/all', 'Admin\ListingController@all');
		Route::get('/api/admin/listings/publish', 'Admin\ListingController@publish');
		Route::get('/api/admin/listings/unpublish', 'Admin\ListingController@unpublish');
		Route::get('/api/admin/listings/expired', 'Admin\ListingController@expired');

		Route::get('/api/admin/profile/all', 'Admin\ProfileController@all');
		Route::get('/api/admin/employers/all', 'Admin\CompanyController@all');

		Route::get('/api/admin/deposits/all', 'Admin\DepositController@all');
		Route::get('/api/admin/deposits/pending', 'Admin\DepositController@pending');
		Route::get('/api/admin/deposits/accepted', 'Admin\DepositController@accepted');
		Route::get('/api/admin/deposits/rejected', 'Admin\DepositController@rejected');

		Route::get('/api/payment/gateway', 'Api\PaymentController@all');
		Route::post('/api/payment/gateway', 'Api\PaymentController@store');

		Route::post('/api/package/delete', 'Admin\PackageController@destroy')->name('package.store');

		Route::post('/api/package/create', 'Admin\PackageController@store')->name('package.store');
		Route::get('/api/package/all/{package}', 'Admin\PackageController@get');
		Route::post('/api/package/all/{package}', 'Admin\PackageController@update');

		Route::post('/api/category/create', 'Admin\CategoryController@store');
		Route::post('/api/category/delete', 'Admin\CategoryController@destroy');
		Route::post('/api/category/edit', 'Admin\CategoryController@update');

		Route::post('/api/company-type/create', 'Admin\CompanyTypeController@store');
		Route::post('/api/company-type/delete', 'Admin\CompanyTypeController@destroy');
		Route::post('/api/company-type/edit', 'Admin\CompanyTypeController@update');

		Route::post('/api/education/create', 'Admin\EducationController@store');
		Route::post('/api/education/delete', 'Admin\EducationController@destroy');
		Route::post('/api/education/edit', 'Admin\EducationController@edit');

		Route::post('/api/experience/create', 'Admin\ExperienceController@store');
		Route::post('/api/experience/delete', 'Admin\ExperienceController@destroy');
		Route::post('/api/experience/edit', 'Admin\ExperienceController@edit');

		Route::post('/api/level/create', 'Admin\LevelController@store');
		Route::post('/api/level/delete', 'Admin\LevelController@destroy');
		Route::post('/api/level/edit', 'Admin\LevelController@edit');

		Route::post('/api/industry/create', 'Admin\IndustryController@store');
		Route::post('/api/industry/delete', 'Admin\IndustryController@destroy');
		Route::post('/api/industry/edit', 'Admin\IndustryController@edit');

		Route::post('/api/location/create', 'Admin\LocationController@store');
		Route::post('/api/location/delete', 'Admin\LocationController@destroy');
		Route::post('/api/location/edit', 'Admin\LocationController@edit');

		Route::post('/api/salary/create', 'Admin\SalaryController@store');
		Route::post('/api/salary/delete', 'Admin\SalaryController@destroy');
		Route::post('/api/salary/edit', 'Admin\SalaryController@edit');

		Route::post('/api/term/create', 'Admin\TermController@store');
		Route::post('/api/term/delete', 'Admin\TermController@destroy');
		Route::post('/api/term/edit', 'Admin\TermController@edit');

		Route::post('/api/employee-type/create', 'Admin\EmployeeTypeController@store');
		Route::post('/api/employee-type/delete', 'Admin\EmployeeTypeController@destroy');
		Route::post('/api/employee-type/edit', 'Admin\EmployeeTypeController@edit');
	});

});

/* Jobseeker block */
Route::group(['prefix' => 'jobseeker', 'namespace' => 'Seeker', 'as' => 'jobseeker.', 'middleware' => ['role:jobseeker']], function(){

	Route::get('/{vue?}', 'HomeController@index')->name('index')->where('vue', '[\/\w\.-]*');

});

/* Admin block */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function(){

	Route::get('/{vue?}', 'HomeController@index')->name('index')->where('vue', '[\/\w\.-]*');

});

/* Employer block */
Route::group(['prefix' => 'employer', 'namespace' => 'Employer', 'as' => 'employer.', 'middleware' => ['role:employer']], function(){

	Route::get('/{vue?}', 'HomeController@index')->name('index')->where('vue', '[\/\w\.-]*');

});