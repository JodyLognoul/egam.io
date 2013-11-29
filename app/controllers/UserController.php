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
		$user = new User;
		return View::make('user/create',compact('user'));
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
		//
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
		
		if( Auth::attempt($credentials) ){
			return Redirect::intended('/')->with('message', 'Welcome back user :) !');
		}else{
			Input::flashExcept('password');
			return Redirect::intended('/')->with('error','The login or the password you entered is not correct :/');			
		}
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

}