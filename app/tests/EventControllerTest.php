<?php

class EventControllerTest extends TestCase {

	public function testIndex()
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
			'event_date'		=> 'Fri 25 Apr 2014 02:15',
			'max_place' 		=> '8',
			'address'			=> '29, Seftigenstrasse, 3007, Bern, Switzerland'));
		$this->assertRedirectedToRoute('homepage');
	}

}