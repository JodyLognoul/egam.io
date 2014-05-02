@extends('layouts/master')

@section('content')

{{ Form::open(array('route' => 'user.store','class' => 'register form-signin form-horizontal', 'role' => 'form')) }}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Register</h3>
	</div>
	<div class="panel-body">

	<!-- username -->
	{{ Form::label('username', 'Username') }}
	{{ Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder' => 'Username','autofocus' => "")) }}
	<span class="text-danger">{{ $errors->first('username') }}</span>

	<!-- email -->
	{{ Form::label('email', 'Email address') }}
	{{ Form::email('email', Input::old('email'), array('class' => 'form-control','placeholder' => 'Email','autofocus' => "")) }}
	<span class="text-danger">{{ $errors->first('email') }}</span>	
	
	<!-- password -->
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password', array('class' => 'form-control','placeholder' => 'Password')) }}
	<span class="text-danger">{{ $errors->first('password') }}</span>

	<!-- submit -->
	{{ Form::submit('Register', array('class' => 'btn btn-lg btn-primary btn-block' )) }}
	</div>
</div>

{{ Form::close() }}
	
@stop

