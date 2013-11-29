<?php

class AddressTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Address::create(array(
			'id' => '1', 
			'country' => 'Belgium', 
			'str_name' => 'Rue sur la fontaine', 
			'str_no' => '42', 
			'cp' => '4000', 
			'city' => 'Liège'));
		Address::create(array(
			'id' => '2', 
			'country' => 'Switzerland', 
			'str_name' => 'Seftigenstrasse', 
			'str_no' => '29', 
			'cp' => '3007', 
			'city' => 'Bern'));
		Address::create(array(
			'id' => '3', 
			'country' => '/', 
			'str_name' => '/', 
			'str_no' => '/', 
			'cp' => '/', 
			'city' => '/'));
	}

}