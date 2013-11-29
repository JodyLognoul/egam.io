<?php

class PartyTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Party::create(array(
			'id' 			=> '1', 
			'name' 			=> 'Petite soirée jeu entre amis et autres!', 
			'description' 	=> 'Description! Description! Description! Description! Petite soirée entre amis et autres!', 
			'party_date' 	=> '14 février 2013', 
			'max_place' 	=> '14', 
			'current_place' => '7',
			'address_id' 	=> '1'));
		Party::create(array(
			'id' 			=> '2', 
			'name' 			=> 'Une après-midi jeu au bord de la rivière!', 
			'description' 	=> 'Description! Description! Une après-midi jeu au bord de la rivière! Description!', 
			'party_date' 	=> '01 octobre 2013', 
			'max_place' 	=> '8', 
			'current_place' => '2',
			'address_id' 	=> '2'));
		Party::create(array(
			'id' 			=> '3', 
			'name' 			=> 'Site', 
			'description' 	=> 'Site', 
			'party_date' 	=> '10 janvier 2013', 
			'max_place' 	=> '8', 
			'current_place' => '2',
			'address_id' 	=> '3'));
	}

}