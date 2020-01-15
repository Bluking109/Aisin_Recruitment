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
	Route::group([
		'prefix' => AIIASetting::getValue('admin_base_route',
		config('aiia.default_url_admin')),
		'as' => 'admin.'
	], function() {
		Auth::routes();

		Route::group(['middleware' => ['auth', 'admin.locale']], function() {
			Route::get('/', 'DashboardController@index');
			Route::get('home', 'DashboardController@index')->name('home');
			Route::resource('users', 'UserController')->except('edit', 'show', 'create');
			Route::resource('settings', 'SettingController')->only('index', 'store');
			Route::resource('vendors', 'VendorController')->except('edit', 'show', 'create');
			Route::get('vendors/get-vendor', 'VendorController@getVendor')->name('vendors.getvendor');
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

			Route::get('job-vacancies/get-job-vacancies', 'JobVacancyController@getJobVacancies')->name('job-vacancies.getjobvacancies');
			Route::resource('job-vacancies', 'JobVacancyController');

			Route::resource('majors', 'MajorController')->except('edit', 'show', 'create');

			Route::resource('departments', 'DepartmentController')->except('edit', 'show', 'create');
			Route::get('departments/get-department', 'DepartmentController@getDepartment')->name('departments.getdepartment');
			Route::resource('sections', 'SectionController')->except('edit', 'show', 'create');
			Route::get('sections/get-section', 'SectionController@getSection')->name('sections.getsections');
			Route::resource('positions', 'PositionController')->except('edit', 'show', 'create');
			Route::get('positions/get-position', 'PositionController@getPosition')->name('positions.getposition');
			Route::resource('about-us', 'AboutController')->except('edit', 'show', 'create');
			Route::resource('how-to-applies', 'HowToApplyController')->except('edit', 'show', 'create');
			Route::resource('announcements', 'AnnouncementController')->except('edit', 'show', 'create');
			Route::resource('recruitment-stages', 'RecruitmentStageController')->except('edit', 'show', 'create');
			Route::get('recruitment-stages/get-stages', 'RecruitmentStageController@getStage')->name('recruitment-stages.getstage');

			Route::get('job-seekers/black-list', 'JobSeekerController@indexBlacklist')
				->name('job-seekers.indexblacklist');
			Route::resource('job-seekers', 'JobSeekerController')->only('index', 'show', 'destroy');
			Route::get('job-seekers/getpdf/{job_seeker}', 'JobSeekerController@getPdf')
				->name('job-seekers.download-pdf');
			Route::put('job-seekers/{job_seeker}/black-list', 'JobSeekerController@updateBlacklist')
				->name('job-seekers.updateblacklist');
			Route::put('job-seekers/{job_seeker}/unblack-list', 'JobSeekerController@updateUnblacklist')
				->name('job-seekers.updateunblacklist');
			Route::put('job-seekers/{job_seeker}/white-list', 'JobSeekerController@updateWhiteList')
				->name('job-seekers.updatewhitelist');
			Route::get('job-seekers/{job_seeker}/photo', 'JobSeekerController@getPhoto')
				->name('job-seekers.photo');

			Route::get('job-seekers/{job_seeker}/document/{type}', 'JobSeekerController@getDocument')
				->name('job-seekers.getdocument');

			Route::get('job-applications/export', 'JobApplicationController@export')->name('job-applications.export');

			Route::get('job-applications/in-process', 'JobApplicationController@indexInProcess')->name('job-applications.in-process');
			Route::get('job-applications/rejected', 'JobApplicationController@indexRejected')->name('job-applications.rejected');
			Route::get('job-applications/accepted', 'JobApplicationController@indexAccepted')->name('job-applications.accepted');
			Route::get('job-applications/assign', 'JobApplicationController@indexAssign')->name('job-applications.assign');

			Route::get('job-applications/{job_application}', 'JobApplicationController@show')->name('job-applications.show');
			Route::delete('job-applications/{job_application}', 'JobApplicationController@destroy')->name('job-applications.destroy');
			Route::put('job-applications/{job_application}/reject', 'JobApplicationController@reject')->name('job-applications.reject');
			Route::put('job-applications/{job_application}/accept', 'JobApplicationController@acceptApplication')->name('job-applications.accept');
			Route::put('job-applications/{job_application}/next-stage', 'JobApplicationController@nextStage')->name('job-applications.next-stage');
			Route::put('job-applications/{job_application}/assign', 'JobApplicationController@assignVacancy')->name('job-applications.assignvacancy');
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
		Route::get('majors', 'MajorController@getAll')->name('majors.get');
		Route::get('wa-notifications', 'WaController@getAll')->name('wa-notifications.get');
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

		Route::get('work-experience', 'WorkExperienceController@index')->name('work-experience.index');
		Route::put('work-experience', 'WorkExperienceController@update')->name('work-experience.update');

		Route::get('interest-concept', 'InterestConceptController@index')->name('interest-concept.index');
		Route::put('interest-concept', 'InterestConceptController@update')->name('interest-concept.update');

		Route::get('document', 'DocumentController@index')->name('document.index');
		Route::put('document', 'DocumentController@update')->name('document.update');
		Route::get('document/download/{type}', 'DocumentController@getFile')->name('document.getfile');

		Route::get('social-activity', 'SocialActivityController@index')->name('social-activity.index');
		Route::put('social-activity', 'SocialActivityController@update')->name('social-activity.update');

		Route::get('other', 'OtherController@index')->name('other.index');
		Route::put('other', 'OtherController@update')->name('other.update');

		Route::get('applied-jobs', 'AppliedJobController@index')->name('applied-jobs.index');
		Route::put('applied-jobs/{id}', 'AppliedJobController@update')->name('applied-jobs.update');
	});

	Route::group([
		'middleware' => 'auth:job_seekers'
	], function() {
		Route::post('job-vacancies/{slug}/apply', 'JobVacancyController@applyJob')->name('job-vacancies.apply');
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
	// Route::get('about-us', 'PageController@aboutUs')->name('about-us');
	Route::resource('job-vacancies', 'JobVacancyController')->only('index', 'show');
	Route::get('how-to-apply', 'PageController@howToApply')->name('how-to-apply.index');

	Route::group([
		'as' => 'password.',
		'prefix' => 'password'
	], function() {
		Route::namespace('Auth')->group(function() {
			Route::get('reset', 'ForgotPasswordController@showLinkRequestForm')->name('request');
			Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('reset');
			Route::post('reset', 'ResetPasswordController@reset')->name('update');
			Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('email');
			Route::put('password/change', 'ResetPasswordController@change')->name('change');
		});
	});
});