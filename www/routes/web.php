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

Auth::routes();

Route::get('/', function() {
	return view('index');
});


/*
|---------------------
|  Admin Routes
|---------------------
|
| The routes to define the administration routes
|
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function(){
	Route::get('', function() {
		return redirect('/dashboard');
	});
	
	Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');
	
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
