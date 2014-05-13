<?php

class UserControllerTest extends TestCase {
	// STORE()
	public function testStoreFail()
	{
		$this->be( User::find(1) );

		$response = $this->action('POST', 'UserController@store',array(
			'email'    => '',
			'username' => '12',
			'password'  => '123'
		));
		$this->assertRedirectedTo(URL::route('landing').'#register');
	}
	
	public function testStoreFailByUniqueEmail()
	{
		$this->be( User::find(1) );

		$response = $this->action('POST', 'UserController@store',array(
			'email'    => 'lognoulj@gmail.com',
			'username' => 'Narcotic88',
			'password'  => 'Narcotic88'
		));
		$this->assertRedirectedTo(URL::route('landing').'#register');
	}
	public function off_testStoreSuccess()
	{
		$this->be( User::find(1) );

		$response = $this->action('POST', 'UserController@store',array(
			'email'    => '',
			'username' => '',
			'password'  => ''
		));
		$this->assertRedirectedToRoute('homepage');
	}

}