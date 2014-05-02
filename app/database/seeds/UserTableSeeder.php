<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "Narcotic", 	'name' => "Lognoul", 	'surname' => "Jody", 	'birthday' => "14.02.1985", 'email' => "lognoulj@gmail.com", 	'password' => Hash::make('Narcotic1') ));
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "Rissi", 		'name' => "Fasel", 		'surname' => "Doris", 	'birthday' => "10.10.1985", 'email' => "riss_@gmx.ch", 			'password' => Hash::make('Rissi1') ));
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "Johndoe", 	'name' => "Doe", 		'surname' => "John", 	'birthday' => "09.09.1989", 'email' => "johndoe@gmail.com", 	'password' => Hash::make('Johndoe1') ));		
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "User1", 		'name' => "Doe1", 		'surname' => "John1", 	'birthday' => "01.01.1981", 'email' => "user1@gmail.com", 	'password' => Hash::make('user1') ));
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "User2", 		'name' => "Doe2", 		'surname' => "John2", 	'birthday' => "02.02.1982", 'email' => "user2@gmail.com", 	'password' => Hash::make('user2') ));
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "User3", 		'name' => "Doe3", 		'surname' => "John3", 	'birthday' => "03.03.1983", 'email' => "user3@gmail.com", 	'password' => Hash::make('user3') ));
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "User4", 		'name' => "Doe4", 		'surname' => "John4", 	'birthday' => "04.04.1984", 'email' => "user4@gmail.com", 	'password' => Hash::make('user4') ));
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "User5", 		'name' => "Doe5", 		'surname' => "John5", 	'birthday' => "05.05.1985", 'email' => "user5@gmail.com", 	'password' => Hash::make('user5') ));
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "User6", 		'name' => "Doe6", 		'surname' => "John6", 	'birthday' => "06.06.1986", 'email' => "user6@gmail.com", 	'password' => Hash::make('user6') ));
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "User7", 		'name' => "Doe7", 		'surname' => "John7", 	'birthday' => "07.07.1987", 'email' => "user7@gmail.com", 	'password' => Hash::make('user7') ));
		User::create(array('url_confirmation' => '#', 'social_uid' => '/', 'social_provider' => 'facebook', 'image' => '#', 'username' => "User8", 		'name' => "Doe8", 		'surname' => "John8", 	'birthday' => "08.08.1988", 'email' => "user8@gmail.com", 	'password' => Hash::make('user8') ));

	}

}