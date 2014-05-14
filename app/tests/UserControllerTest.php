<?php

class UserControllerTest extends TestCase {
	// STORE()
	public function testStoreFail()
	{
		$response = $this->action('POST', 'UserController@store',array(
			'email'    => '',
			'username' => '12',
			'password'  => '123'
		));
		$this->assertRedirectedTo(URL::route('landing').'#register');
	}
	
	public function testStoreFailByUniqueEmail()
	{
		$response = $this->action('POST', 'UserController@store',array(
			'email'    => 'lognoulj@gmail.com',
			'username' => 'Narcotic88',
			'password'  => 'Narcotic88'
		));
		$this->assertRedirectedTo(URL::route('landing').'#register');
	}
	public function testStoreSuccess()
	{
		$response = $this->action('POST', 'UserController@store',array(
			'email'    => 'phpunit@gmail.com',
			'username' => 'phpunit',
			'password'  => 'phpunit'
		));
		
		User::where('username','phpunit')->delete();

		$this->assertRedirectedToRoute('homepage');
	}

}