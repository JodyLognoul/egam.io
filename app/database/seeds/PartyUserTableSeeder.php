<?php

class PartyUserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('party_user')->insert(array(
			'role' 		=> 'host',
			'party_id' 	=> 2,
			'user_id'	=> 1
		));
		
		DB::table('party_user')->insert(array(
			'role' 		=> 'host',
			'party_id' 	=> 2,
			'user_id'	=> 1
		));

		DB::table('party_user')->insert(array(
			'role' 		=> 'host',
			'party_id' 	=> 1,
			'user_id'	=> 1
		));

		DB::table('party_user')->insert(array(
			'role' 		=> 'guest',
			'party_id' 	=> 1,
			'user_id'	=> 2
		));

		DB::table('party_user')->insert(array(
			'role' 		=> 'guest',
			'party_id' 	=> 1,
			'user_id'	=> 3
		));

	}

}