<?php

class EventUserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('event_user')->insert(array(
			'role' 		=> 'host',
			'event_id' 	=> 3,
			'user_id'	=> 3
		));
		
		DB::table('event_user')->insert(array(
			'role' 		=> 'host',
			'event_id' 	=> 2,
			'user_id'	=> 2
		));

		DB::table('event_user')->insert(array(
			'role' 		=> 'host',
			'event_id' 	=> 1,
			'user_id'	=> 1
		));

		DB::table('event_user')->insert(array(
			'role' 		=> 'host',
			'event_id' 	=> 4,
			'user_id'	=> 3
		));
		
		DB::table('event_user')->insert(array(
			'role' 		=> 'host',
			'event_id' 	=> 5,
			'user_id'	=> 2
		));

		DB::table('event_user')->insert(array(
			'role' 		=> 'host',
			'event_id' 	=> 6,
			'user_id'	=> 1
		));

		DB::table('event_user')->insert(array(
			'role' 		=> 'host',
			'event_id' 	=> 7,
			'user_id'	=> 1
		));

		DB::table('event_user')->insert(array(
			'role' 		=> 'guest',
			'event_id' 	=> 1,
			'user_id'	=> 2
		));

		DB::table('event_user')->insert(array(
			'role' 		=> 'guest',
			'event_id' 	=> 1,
			'user_id'	=> 3
		));

	}

}