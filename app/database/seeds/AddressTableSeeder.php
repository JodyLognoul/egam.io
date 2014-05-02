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
			'city' => 'Liège',
			'full' => 'a42, Rue sur la fontaine, 4000, Liège, Belgium'));
		Address::create(array(
			'id' => '2', 
			'country' => 'Switzerland', 
			'str_name' => 'Seftigenstrasse', 
			'str_no' => '29', 
			'cp' => '3007', 
			'city' => 'Bern',
			'full' => 'b29, Seftigenstrasse, 3007, Bern, Switzerland'));
		Address::create(array(
			'id' => '3', 
			'country' => '/', 
			'str_name' => '/', 
			'str_no' => '/', 
			'cp' => '/', 
			'city' => '/',
			'full' => 'cKalkeri, Dharwad District, Karnataka, 580007, India.'));
		Address::create(array(
			'id' => '4', 
			'country' => '/', 
			'str_name' => '/', 
			'str_no' => '/', 
			'cp' => '/', 
			'city' => '/',
			'full' => 'dKalkeri, Dharwad District, Karnataka, 580007, India.'));
	}

}