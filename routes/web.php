<?php
Route::redirect('/', 'admin/home');
Route::redirect('/admin', 'home');

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
	// Dashboard Route
    Route::get('/home', 'HomeController@index')->name('home');
    // Permission Routes
    Route::resource('permissions', 'Admin\PermissionsController');
    // Role Routes
    Route::resource('roles', 'Admin\RolesController');
    // User Routes
    Route::resource('users', 'Admin\UsersController');
    // My Profile Routes
    Route::resource('my-profile', 'Admin\MyProfileController');
});
