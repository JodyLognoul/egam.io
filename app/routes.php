<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Homepage
Route::get('/', 	array('as' => 'homepage', 		'uses' => 'PartyController@index'));

// Party
Route::resource('party', 'PartyController');

// User
Route::resource('user', 'UserController');
Route::get('login', 					array('as' => 'user.login.page', 			'uses' => 'UserController@loginPage'));
Route::post('login', 					array('as' => 'user.login', 				'uses' => 'UserController@login'));
Route::get('register', 					array('as' => 'user.register', 				'uses' => 'UserController@create'));
Route::get('logout', 					array('as' => 'user.logout', 				'uses' => 'UserController@logout'));
Route::get('profile', 					array('as' => 'user.profile', 				'uses' => 'UserController@profileGeneral', 'before' => 'auth'));
Route::get('profile/general', 			array('as' => 'user.profile.general', 		'uses' => 'UserController@profileGeneral', 'before' => 'auth'));
Route::get('profile/parties', 			array('as' => 'user.profile.parties', 		'uses' => 'UserController@profileParties', 'before' => 'auth'));
Route::get('profile/notifications', 	array('as' => 'user.profile.notifications', 'uses' => 'UserController@profileNotifications', 'before' => 'auth'));
Route::get('profile/security', 			array('as' => 'user.profile.security', 		'uses' => 'UserController@profileSecurity', 'before' => 'auth'));


