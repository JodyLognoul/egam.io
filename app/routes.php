<?php
header('Access-Control-Allow-Origin: http://localhost:9000');

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
Route::get(			'/welcome', 				array('as' => 'landing', 					'uses' => 'DefaultController@landing'));
Route::get(			'/', 						array('as' => 'homepage', 					'uses' => 'EventController@index'));

// Event
Route::resource(	'event', 'EventController');
Route::get(			'join/{id}', 				array('as' => 'event.join',		 			'uses' => 'EventController@join'));
Route::get(			'leave/{eid}',	 			array('as' => 'event.leave',				'uses' => 'EventController@leave'));
Route::get(			'cancel/{eid}', 			array('as' => 'event.cancel',				'uses' => 'EventController@cancel'));
Route::get(			'map', 						array('as' => 'event.index.map',			'uses' => 'EventController@indexMap'));

// -- API
Route::resource(	'api/event', 'EventApiController');


// User
// Facebook
Route::get(		'login-with-facebook', 		array('as' => 'user.login.with.facebook', 	'uses' => 'UserController@loginWithFacebook'));

// Google
Route::get(		'login-with-google', 		array('as' => 'user.login.with.google', 	'uses' => 'UserController@loginWithGoogle'));
 
Route::resource(	'user', 'UserController');
Route::get(			'login', 					array('as' => 'user.login.page', 			'uses' => 'UserController@loginPage'));
Route::post(		'login', 					array('as' => 'user.login', 				'uses' => 'UserController@login'));
Route::get(			'register', 				array('as' => 'user.register', 				'uses' => 'UserController@create'));
Route::get(			'logout', 					array('as' => 'user.logout', 				'uses' => 'UserController@logout'));
Route::get(			'profile', 					array('as' => 'user.profile', 				'uses' => 'UserController@profileGeneral', 'before' => 'auth'));
Route::get(			'profile/general', 			array('as' => 'user.profile.general', 		'uses' => 'UserController@profileGeneral', 'before' => 'auth'));
Route::get(			'profile/parties', 			array('as' => 'user.profile.parties', 		'uses' => 'UserController@profileParties', 'before' => 'auth'));
Route::get(			'profile/notifications', 	array('as' => 'user.profile.notifications', 'uses' => 'UserController@profileNotifications', 'before' => 'auth'));
Route::get(			'profile/security', 		array('as' => 'user.profile.security', 		'uses' => 'UserController@profileSecurity', 'before' => 'auth'));

// Media
Route::post(		'picture', 					array('as' => 'media.picture.upload', 		'uses' => 'MediaController@upload'));

// Notification
Route::resource(	'notification', 'NotificationController');
Route::get(			'notification/{id}/seen', 	array('as' => 'notification.seen', 			'uses' => 'NotificationController@markAsSeen','before' => 'auth'));


// Ioc
App::bind('Notify', function($app)
{
    return new NotificationController;
});
