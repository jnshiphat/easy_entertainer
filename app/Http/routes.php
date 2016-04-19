<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/* Admin URLs */
Route::group(array('prefix'=>'admin'),function(){
	Route::get('/login', 'admin\LoginController@index');
	Route::get('/logout','admin\LoginController@adminlogout');
/*	
	Route::get('/superadmin', 'admin\DashboardController@superadmin_dashboard');
	Route::get('/normaladmin', 'admin\DashboardController@normaladmin_dashboard');
*/
	Route::get('/admindashboard', 'admin\DashboardController@admin_dashboard');
	Route::get('/admincreate', 'admin\DashboardController@adminuser_create');
	Route::get('/adminmanage', 'admin\DashboardController@adminuser_management');
	
	Route::post('/adminoperations', 'admin\DashboardController@adminuser_operations');
	Route::post('/verify', 'admin\LoginController@login_verify');
	Route::post('/admincreate', 'admin\LoginController@admin_create');
});