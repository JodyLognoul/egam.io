<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('AddressTableSeeder');
		$this->call('EventTableSeeder');
		$this->call('EventUserTableSeeder');
		$this->call('NotificationTableSeeder');
		$this->call('PictureTableSeeder');
	}

}