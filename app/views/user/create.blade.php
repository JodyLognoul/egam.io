@extends('layouts/master')

@section('content')

{{ Form::open(array('route' => 'user.store','class' => 'form-signin form-horizontal', 'role' => 'form')) }}
	<h2 class="form-signin-heading">Please register</h2>

	<!-- username -->
	{{ Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder' => 'Username','autofocus' => "")) }}
	<span class="text-danger">{{ $errors->first('username') }}</span>

	<!-- email -->
	{{ Form::email('email', Input::old('email'), array('class' => 'form-control','placeholder' => 'Email','autofocus' => "")) }}
	<span class="text-danger">{{ $errors->first('email') }}</span>	
	
	<!-- password -->
	{{ Form::password('password', array('class' => 'form-control','placeholder' => 'Password')) }}
	<span class="text-danger">{{ $errors->first('password') }}</span>

	<!-- submit -->
	{{ Form::submit('Register', array('class' => 'btn btn-lg btn-primary btn-block' )) }}
	

{{ Form::close() }}
	
@stop

