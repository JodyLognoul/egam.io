<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
		'Facebook' => array(
			'client_id'     => '245285379007906',
			'client_secret' => '0b366305da139cd714ad6ee8e183eb2c',
			'scope'         => array('email'),
			),
		'Google' => array(
			'client_id'     => '351206768061-fan14gp5dk4kpljf3eqrbg9rsbtgh0o8.apps.googleusercontent.com',
			'client_secret' => 'ICE04ZAgzoHIDHJkd3TgHamo',
			'scope'         => array('userinfo_email', 'userinfo_profile'),
			),  		

		)

	);