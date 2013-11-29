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
Route::post('login', 	array('as' => 'user.login', 	'uses' => 'UserController@login'));
Route::get('register', 	array('as' => 'user.register', 	'uses' => 'UserController@create'));
Route::get('logout', 	array('as' => 'user.logout', 	'uses' => 'UserController@logout'));


