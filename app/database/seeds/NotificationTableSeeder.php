<?php

class NotificationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Notification::create(array('id' => '1', 'message' => 'Un membre a rejoint le soirée user_1', 'event_id' => '1', 'user_id' => '1'));
		Notification::create(array('id' => '2', 'message' => 'Un membre a rejoint le soirée user_1', 'event_id' => '2', 'user_id' => '1'));
		Notification::create(array('id' => '3', 'message' => 'Un membre a rejoint le soirée user_2', 'event_id' => '3', 'user_id' => '1'));
		Notification::create(array('id' => '4', 'message' => 'Un membre a rejoint le soirée user_2', 'event_id' => '3', 'user_id' => '1'));
	}

}