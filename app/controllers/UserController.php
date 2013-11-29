<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();		

		$rules = array(
			'email' 	=> 'required|email|unique:users',
			'username' 	=> 'required|between:3,12',
			'password' 	=> 'required|between:6,50',
		);

		$validation = Validator::make($inputs, $rules);

		if ($validation->fails())
		{			
			Input::flashExcept('password');
			return Redirect::route('user.create')->withErrors($validation);
		}

		$user = new User;		 
		$user->url_confirmation = sha1(time());
		$user->email 	= $inputs['email'];
		$user->username = $inputs['username'];
		$user->password = Hash::make( $inputs['password'] );		

		$user->save();

		return Redirect::route('homepage')->with('message', 'You\'re well registered! Have a look at your <a href="#" class="alert-link">profile</a> !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inputs = Input::all();		

		$rules = array(
			'username' 	=> 'required|between:3,12'
		);

		$validation = Validator::make($inputs, $rules);

		if ($validation->fails())
		{			
			Input::flashExcept('password');
			return Redirect::route('user.profile')->withErrors($validation);
		}

		$user = User::findOrFail($id);
		
		$user->fill($inputs);
		$user->save();
		
		return Redirect::route('user.profile')->with('profile-message','Update!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Login
	 *
	 * @return Response
	 */
	public function login()
	{
		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'),
			'confirmed' => 0);
		
		if( Auth::attempt($credentials,true) ){
			return Redirect::intended('/');
		}else{
			Input::flashExcept('password');
			return Redirect::intended('/')->with('error','The login or the password you entered is not correct :/');			
		}
	}
	/**
	 * Redirect to the homepage with a login message
	 *
	 * @return Response
	 */
	public function loginPage()
	{
		Auth::logout();

		return Redirect::route('homepage')->with('message', 'Please use the sidebar form to log you in <span class="text-right glyphicon glyphicon-hand-up"></span>');
	}

	/**
	 * Logout
	 *
	 * @return Response
	 */
	public function logout()
	{
		Auth::logout();
		return Redirect::intended('/');			
	}

	/**
	 * profileGeneral
	 *
	 * @return Response
	 */
	public function profileGeneral()
	{
		return View::make('user/profile/general')->nest('child','user/profile/child/submenu',array('submenu' => 'general'));;
	}

	/**
	 * profileParties
	 *
	 * @return Response
	 */
	public function profileParties()
	{
		return View::make('user/profile/parties')->nest('child','user/profile/child/submenu',array('submenu' => 'parties'));
	}

	/**
	 * profileNotifications
	 *
	 * @return Response
	 */
	public function profileNotifications()
	{
		return View::make('user/profile/notifications')->nest('child','user/profile/child/submenu',array('submenu' => 'notifications'));
	}

	/**
	 * profileSecurity
	 *
	 * @return Response
	 */
	public function profileSecurity()
	{
		return View::make('user/profile/security')->nest('child','user/profile/child/submenu',array('submenu' => 'security'));
	}

}