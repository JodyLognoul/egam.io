@extends('layouts/master')

@section('content')

{{ Form::model(Auth::user(),array('method' => 'PUT','route' => array('user.update',Auth::user()->id),'class' => 'form-profile form-horizontal', 'role' => 'form')) }}
	@if( Session::has('profile-message') )
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('profile-message') }}
	</div>
	@endif
	<div class="panel panel-default profile">
		<div class="panel-heading">
			<h3>Profile <small>- General</small></h3>
		</div>
		<div class="panel-body">
		
		{{ $child }}		
		<div class="profile-inputs">			
			<!-- username -->
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder' => 'Username','autofocus' => "")) }}
			<span class="text-danger">{{ $errors->first('username') }}</span>		
		</div>
		<!-- submit -->
		{{ Form::submit('Save the modifications', array('class' => 'btn btn-primary' )) }}		
	</div>
</div>

{{ Form::close() }}

@stop

