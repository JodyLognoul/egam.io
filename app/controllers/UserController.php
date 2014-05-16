<?php

class UserController extends \BaseController {

	public function loginWithFacebook(){
		
		// get data from input
		$code = Input::get( 'code' );

    	// get fb service
		$fb = OAuth::consumer( 'Facebook' );

    	// check if code is valid

    	// if code is provided get user data and sign in
		if ( !empty( $code ) ) {

        	// This was a callback request from facebook, get the token
			$token = $fb->requestAccessToken( $code );

        	// Send a request with it
			$result = json_decode( $fb->request( '/me' ), true );

			$user = DB::table('users')->where('email', $result['email'])->first();
			
			if( ! $user ){
				// Create the user
				$date = new DateTime();
				$user = new User;		 

				$user->date_register = $date->format('Y-m-d H:i:s');
				$user->email 			= $result['email'];
				$user->username 		= $result['name'];
				$user->image 			= 'https://graph.facebook.com/'.$result['id'].'/picture?type=large';
				$user->surname  		= $result['first_name'];
				$user->name 			= $result['last_name'];
				$user->gender 			= $result['gender'];
				$user->social_uid 		= $result['id'];
				$user->social_provider 	= 'facebook';
				$user->confirmed 		= true;
				$user->save(); 
			}
			// Connect the user
			Auth::loginUsingId($user->id);
			return Redirect::route('homepage');
		}
    	// if not ask for permission first
		else {
        	// get fb authorization
			$url = $fb->getAuthorizationUri();

        	// return to facebook login url
			return Redirect::to( (string)$url );
		}
	}

	public function loginWithGoogle(){
	    // get data from input
		$code = Input::get( 'code' );

	    // get google service
		$googleService = OAuth::consumer( 'Google' );

	    // check if code is valid

	    // if code is provided get user data and sign in
		if ( !empty( $code ) ) {

	        // This was a callback request from google, get the token
			$token = $googleService->requestAccessToken( $code );

	        // Send a request with it
			$result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );
			$user = DB::table('users')->where('email', $result['email'])->first();

			if( ! $user ){
				// Create the user
				$date = new DateTime();
				$user = new User;		 

				$user->date_register = $date->format('Y-m-d H:i:s');
				$user->email 			= $result['email'];
				$user->username 		= $result['name'];
				$user->surname  		= $result['given_name'];
				$user->name 			= $result['family_name'];
				$user->gender 			= $result['gender'];
				$user->image 			= $result['picture'];
				$user->social_uid 		= $result['id'];
				$user->social_provider 	= 'google';
				$user->confirmed 		= true;
				$user->save(); 
			}
			// Connect the user
			Auth::loginUsingId($user->id);
			return Redirect::route('homepage');
		}
    	// if not ask for permission first
		else {
        // get googleService authorization
			$url = $googleService->getAuthorizationUri();

        // return to facebook login url
			return Redirect::to( (string)$url );
		}
	}

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
			return Redirect::to(URL::route('landing').'#register')->withErrors($validation);
		}
		$date = new DateTime();
		$user = new User;		 
		$user->url_confirmation = sha1($inputs['email'] + time());
		$user->date_register = $date->format('Y-m-d H:i:s');
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
		$user = User::find($id);
		return View::make('user.show', compact('user'));
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
		// $p = new Picture;
		// dd($p);
		for ($i = 0; Input::hasFile('picture-'.$i); $i++) {
			$file = Input::file('picture-'.$i);
			$upload_success = $file->move('uploads/'.$id, $file->getClientOriginalName());
		}

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
			return Redirect::route('event.index');
		}else{
			Input::flashExcept('password');
			return Redirect::to(URL::route('landing').'#login')->with('error','The login or the password you entered is not correct :/');
			// return Redirect::intended('/')->with('error','The login or the password you entered is not correct :/');			
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
		return Redirect::route('homepage');			
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