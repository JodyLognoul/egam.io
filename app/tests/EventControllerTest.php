<?php

class EventControllerTest extends TestCase {

	public function off_testIndex()
	{
		// Auth
		$this->be( User::find(1) );

		$response = $this->action('GET', 'EventController@index');
		$this->assertViewHas('events');

		$events = $response->original->getData()['events'];
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $events);
	}

	// STORE()
	public function testStoreFail()
	{
		$this->be( User::find(1) );

		$response = $this->action('POST', 'EventController@store',array(
			'title' 			=> '',
			'description' 		=> '',
			'event_date'		=> '',
			'event_time'		=> '',
			'max_place' 		=> '',
			'address'			=> ''));
		$this->assertRedirectedToRoute('event.create');
	}

	public function testStoreSuccess()
	{
		$this->be( User::find(1) );

		$response = $this->action('POST', 'EventController@store',array(
			'title' 			=> 'PHPUnit Title',
			'description' 		=> 'PHPUnit Description',
			'event_date'		=> '2014-05-11',
			'event_time'		=> '02:15',
			'max_place' 		=> '8',
			'address'			=> '29, Seftigenstrasse, 3007, Bern, Switzerland'));
		$this->assertRedirectedToRoute('homepage');
	}

}