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
	Route::group(['prefix' => AIIASetting::getValue('admin_base_route'), 'as' => 'admin.'], function() {
		Auth::routes();
		Route::get('/', 'DashboardController@index');
		Route::get('home', 'DashboardController@index')->name('home');

		Route::group(['middleware' => 'auth'], function() {
			Route::resource('users', 'UserController')->except('edit', 'show', 'create');
			Route::resource('settings', 'SettingController');
			Route::resource('vendors', 'VendorController')->except('edit', 'show', 'create');
			Route::resource('degrees', 'DegreeController')->except('edit', 'show', 'create');
			Route::resource('permissions', 'PermissionController')->except('edit', 'show', 'create');
			Route::get('permissions/get-and-group', 'PermissionController@getAndGroup')->name('permissions.getandgroup');
			Route::resource('roles', 'RolesController')->except('edit', 'show', 'create');
			Route::resource('provinces', 'ProvinceController')->except('edit', 'show', 'create');
			Route::resource('districts', 'DistrictController')->except('edit', 'show', 'create');
			Route::get('districts/get-province', 'DistrictController@getProvince')->name('districts.getprovince');
			Route::resource('subdistricts', 'SubDistrictController')->except('edit', 'show', 'create');
			Route::get('subdistricts/get-district', 'SubDistrictController@getDistrict')->name('subdistricts.getdistrict');
			Route::resource('villages', 'VillageController')->except('edit', 'show', 'create');
			Route::get('villages/get-subdistrict', 'VillageController@getSubDistrict')->name('villages.getsubdistrict');
		});
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
	Route::get('/', 'PageController@home');
	Route::get('home', 'PageController@home')->name('home');
	Route::get('about-us', 'PageController@aboutUs')->name('about-us');
	Route::get('contact', 'ContactController@index')->name('contact.index');
	Route::get('jobs', 'JobController@index')->name('jobs.index');
	Route::get('jobs/{slug}', 'JobController@show')->name('jobs.show');

	Route::get('profiles/personal-identity', 'ProfileController@indexIdentity')->name('profiles.idenity.show');
	Route::get('profiles/educations', 'ProfileController@indexEducation')->name('profiles.education.show');
	Route::get('profiles/family-environtments', 'ProfileController@indexFamilyEnvirontment')->name('profiles.family-environment.show');
	Route::get('profiles/work-experiences', 'ProfileController@indexWorkExperience')->name('profiles.work-experiences.show');
	Route::get('profiles/personal-interests-concepts', 'ProfileController@indexPersonalInterestConcept')->name('profiles.personal-interests-concepts.show');
	Route::get('profiles/documents', 'ProfileController@indexDocument')->name('profiles.documents.show');
	Route::get('profiles/social-activities', 'ProfileController@indexSocialActivity')->name('profiles.social-activities.show');
	Route::get('profiles/others', 'ProfileController@indexOther')->name('profiles.others.show');
	Route::get('profiles/applied-jobs', 'ProfileController@indexAppliedJob')->name('profiles.applied-jobs.show');

	Route::group(['middleware' => 'auth'], function() {
		// Route with auth middleware
	});
});