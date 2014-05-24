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
	
	// Title size < 8
	public function testStoreFailOnTitle(){
		$this->be( User::find(1) );
		$response = $this->action('POST', 'EventController@store',array('title' => '1234567', 'description'=> 'PHPUnit Description', 'event_datetime'=> 'Wed 21 May 2015 10:51', 'event_time'=> '02:15', 'uniqid'=> 'tests/event_5378c98b19bc0', 'max_places'=> '8', 'address_full'=> '29, Seftigenstrasse, 3007, Bern, Switzerland'));
		$this->assertRedirectedToRoute('event.create');
	}

	// Date < now
	public function testStoreFailOnEventDate(){
		$this->be( User::find(1) );
		$response = $this->action('POST', 'EventController@store',array('event_datetime'=> 'Wed 21 May 2010 10:51', 'title' => '12345678', 'description'=> 'PHPUnit Description', 'event_time'=> '02:15', 'uniqid'=> 'tests/event_5378c98b19bc0', 'max_places'=> '8', 'address_full'=> '29, Seftigenstrasse, 3007, Bern, Switzerland'));
		$this->assertRedirectedToRoute('event.create');
	}

	// STORE()
	public function testStoreFail()
	{
		$this->be( User::find(1) );

		$response = $this->action('POST', 'EventController@store',array(
			'title' 			=> '',
			'description' 		=> '',
			'event_datetime'	=> '',
			'max_places' 		=> '',
			'address_full'		=> ''));
		$this->assertRedirectedToRoute('event.create');
	}

	public function testStoreSuccess()
	{
		$this->be( User::find(1) );

		$response = $this->action('POST', 'EventController@store',array(
			'title' 			=> 'PHPUnit Title',
			'description' 		=> 'PHPUnit Description',
			'event_datetime'	=> 'Thu, 10 Jul 2014 11:05',
			'uniqid'			=> 'tests/event_5378c98b19bc0',
			'max_places' 		=> '10',
			'address_full'		=> '29, Seftigenstrasse, 3007, Bern, Switzerland'));
		$this->assertRedirectedToRoute('homepage');
	}

}