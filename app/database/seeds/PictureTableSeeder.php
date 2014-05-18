<?php

class PictureTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Picture::create(array(
			'id'      => '1',
			'name'    => 'img_5378c99e1f004',
			'folder'  => 'tests/event_5378c98b19bc0',
			'url'     => 'http://local.egam.io/uploads/tests/event_5378c98b19bc0/img_5378c99e1f004/'
		));
		Picture::create(array(
			'id'      => '2',
			'name' 	  => 'img_5378c99e23162',
			'folder'  => 'tests/event_5378c98b19bc0',
			'url'     => 'http://local.egam.io/uploads/tests/event_5378c98b19bc0/img_5378c99e23162/'
		));
		Picture::create(array(
			'id'      => '3',
			'name'	  => 'img_5378c99f5e38e',
			'folder'  => 'tests/event_5378c98b19bc0',
			'url'     => 'http://local.egam.io/uploads/tests/event_5378c98b19bc0/img_5378c99f5e38e/'
		));
		

	}

}