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

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Untuk base admin route bisa di setting melalui menu setting
*/
Route::namespace('Admin')->group(function() {
	Route::group(['prefix' => AIIASetting::getValue('admin_base_route', config('aiia.default_url_admin')), 'as' => 'admin.'], function() {
		Auth::routes();

		Route::group(['middleware' => 'auth'], function() {
			Route::get('/', 'DashboardController@index');
			Route::get('home', 'DashboardController@index')->name('home');
			Route::resource('users', 'UserController')->except('edit', 'show', 'create');
			Route::resource('settings', 'SettingController')->only('index', 'store');
			Route::resource('vendors', 'VendorController')->except('edit', 'show', 'create');
			Route::resource('education-levels', 'EducationLevelController')->except('edit', 'show', 'create');
			Route::get('education-levels/get-education-level', 'EducationLevelController@getEducationLevel')->name('education-levels.geteducationlevel');
			Route::resource('permissions', 'PermissionController')->except('edit', 'show', 'create');
			Route::get('permissions/get-and-group', 'PermissionController@getAndGroup')->name('permissions.getandgroup');
			Route::resource('roles', 'RolesController')->except('edit', 'show', 'create');
			Route::resource('provinces', 'ProvinceController')->except('edit', 'show', 'create');
			Route::get('provinces/get-province', 'ProvinceController@getProvince')->name('provinces.getprovince');
			Route::resource('districts', 'DistrictController')->except('edit', 'show', 'create');
			Route::get('districts/get-district', 'DistrictController@getDistrict')->name('districts.getdistrict');
			Route::resource('subdistricts', 'SubDistrictController')->except('edit', 'show', 'create');
			Route::get('subdistricts/get-subdistrict', 'SubDistrictController@getSubDistrict')->name('subdistricts.getsubdistrict');
			Route::resource('villages', 'VillageController')->except('edit', 'show', 'create');
			Route::resource('jobvacancies', 'JobVacancyController')->except('edit', 'show', 'create');
			Route::resource('departments', 'DepartmentController')->except('edit', 'show', 'create');
			Route::get('departments/get-department', 'DepartmentController@getDepartment')->name('departments.getdepartment');
			Route::resource('sections', 'SectionController')->except('edit', 'show', 'create');
			Route::get('sections/get-section', 'SectionController@getSection')->name('sections.getsections');
			Route::resource('positions', 'PositionController')->except('edit', 'show', 'create');
			Route::get('positions/get-position', 'PositionController@getPosition')->name('positions.getposition');
		});
	});
});

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Untuk route yang di gunakan di admin ataupun website via ajax
*/
Route::namespace('Ajax')->group(function() {
	Route::group(['as' => 'ajax.', 'prefix' => 'ajax'], function() {
		Route::get('education-levels', 'EducationLevelController@getAll')->name('education-levels.get');
		Route::get('provinces', 'ProvinceController@getAll')->name('provinces.get');
		Route::get('districts', 'DistrictController@getAll')->name('districts.get');
		Route::get('sub-districts', 'SubDistrictController@getAll')->name('sub-districts.get');
		Route::get('villages', 'VillageController@getAll')->name('villages.get');
	});
});

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
|
| Untuk base admin route bisa di setting melalui menu setting
*/

Route::namespace('Website')->group(function() {
	Route::namespace('Auth')->group(function() {
		// overide laravel mail verification
		Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
		Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
		Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
	});

	Route::group(['as' => 'auth.'], function() {
		Route::namespace('Auth')->group(function() {
			Route::post('login', 'LoginController@login')->name('login.post');
			Route::post('register', 'RegisterController@register')->name('register.post');

			Route::group(['middleware' => 'auth:job_seekers'], function() {
				Route::post('logout', 'LoginController@logout')->name('logout');
			});
		});
	});

	Route::group([
		'as' => 'profiles.',
		'prefix' => 'profiles',
		'middleware' => 'auth:job_seekers'
	], function() {
		Route::get('personal-identity', 'PersonalController@index')->name('personal-identity.index');
		Route::put('personal-identity', 'PersonalController@update')->name('personal-identity.update');
		Route::get('personal-identity/photo', 'PersonalController@getPhoto')->name('personal-identity.getphoto');

		Route::get('education', 'EducationController@index')->name('education.index');
		Route::put('education', 'EducationController@update')->name('education.update');

		Route::get('family', 'FamilyController@index')->name('family.index');
		Route::put('family', 'FamilyController@update')->name('family.update');
	});

	Route::group([
		'as' => 'contact.',
		'prefix' => 'contact'
	], function() {
		Route::get('/', 'ContactController@index')->name('index');
		Route::post('/', 'ContactController@store')->name('store');
	});

	Route::get('/', 'PageController@home');
	Route::get('home', 'PageController@home')->name('home');
	Route::get('about-us', 'PageController@aboutUs')->name('about-us');
	Route::get('jobs', 'JobController@index')->name('jobs.index');
	Route::get('jobs/{slug}', 'JobController@show')->name('jobs.show');

	Route::get('profiles/work-experiences', 'ProfileController@indexWorkExperience')->name('profiles.work-experiences.show');
	Route::get('profiles/personal-interests-concepts', 'ProfileController@indexPersonalInterestConcept')->name('profiles.personal-interests-concepts.show');
	Route::get('profiles/documents', 'ProfileController@indexDocument')->name('profiles.documents.show');
	Route::get('profiles/social-activities', 'ProfileController@indexSocialActivity')->name('profiles.social-activities.show');
	Route::get('profiles/others', 'ProfileController@indexOther')->name('profiles.others.show');
	Route::get('profiles/applied-jobs', 'ProfileController@indexAppliedJob')->name('profiles.applied-jobs.show');
});