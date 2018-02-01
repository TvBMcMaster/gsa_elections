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

// Auth routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', function() {
	return view('welcome');
});

/*
|-----------------------
|  Organization Routes
|-----------------------
*/


Route::get('/{organization}', 'OrganizationController@index');


/*
|---------------------
|  Admin Routes
|---------------------
|
| The routes to define the administration routes
|
*/

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	Route::namespace('Admin')->group(function(){
		Route::get('', 'DashboardController@index')->name('admin.dashboard');	

		Route::prefix('users')->group(function(){
			Route::get('/', 'UsersController@index')->name('users.index');
			Route::get('/new', 'UsersController@create')->name('users.create');
			Route::post('/new', 'UsersController@store')->name('users.store');
			Route::get('/{user}', 'UsersController@show')->name('users.show');
			Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
			Route::post('/{user}', 'UsersController@update')->name('users.update');
			Route::post('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
		});

		Route::prefix('organizations')->group(function(){
			Route::get('/', 'OrganizationsController@index')->name('organizations.index');
			Route::get('/new', 'OrganizationsController@create')->name('organizations.create');
			Route::post('/new', 'OrganizationsController@store')->name('organizations.store');
			Route::get('/{organization}', 'OrganizationsController@show')->name('organizations.show');
			Route::get('/{organization}/edit', 'OrganizationsController@edit')->name('organizations.edit');
			Route::post('/{organization}', 'OrganizationsController@update')->name('organizations.update');
			Route::post('/{organization}/delete', 'OrganizationsController@destroy')->name('organizations.destroy');
		});
	});	
});

