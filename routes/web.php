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
