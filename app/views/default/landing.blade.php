@extends('layouts/master')

@section('styles')
{{ HTML::style("css/landing.css") }}
@stop

@section('content')
<div class="landing">
	<h2>Find or organise board game events</h2>
	<div class="login-register center-block panel-group panel-group-lists collapse in" id="accordion2" style="height: auto;">
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-social-media" class="btn-social-media collapsed">
						Social Media
					</a>
				</h4>
			</div>
			<div id="collapse-social-media" class="panel-collapse collapse in" style="height: auto;">
				<div class="panel-body">
					<div class="social-media-buttons text-center">
						<a href="{{ URL::route('user.login.with.facebook') }}" class="rotate"><img src="{{ URL::asset('images/facebook_circle_color.svg') }}" alt=""></a>
						<a href="{{ URL::route('user.login.with.google') }}" class="rotate"><img src="{{ URL::asset('images/google_circle_color.svg') }}" alt=""></a>
					</div>				
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-login" class="btn-login collapsed">
						Sign in
					</a>
				</h4>
			</div>
			<div id="collapse-login" class="panel-collapse collapse" style="height: 0;">
				<div class="panel-body">
					{{ Form::open(array('route' => 'user.login','class' => '', 'role' => 'form') ) }}
					<div class="form-group">
						{{ Form::email('email', Input::old('email'), array('class' => 'form-control','placeholder' => 'Email','autofocus' => "")) }}    
					</div>
					<div class="form-group">
						{{ Form::password('password', array('class' => 'form-control','placeholder' => 'Password')) }}
					</div>
					{{ Form::submit('Login', array('class' => 'btn btn-sm btn-success btn-block' )) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-register" class="btn-register">
						Register
					</a>
				</h4>
			</div>
			<div id="collapse-register" class="panel-collapse collapse" style="height: 0;">
				<div class="panel-body">
					{{ Form::open(array('route' => 'user.store','class' => '', 'role' => 'form')) }}
					<div class="form-group">
						{{ Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder' => 'Username','autofocus' => "")) }}
						<span class="text-danger">{{ $errors->first('username') }}</span>
					</div>
					<div class="form-group">
						{{ Form::email('email', Input::old('email'), array('class' => 'form-control','placeholder' => 'Email','autofocus' => "")) }}
						<span class="text-danger">{{ $errors->first('email') }}</span>
					</div>
					<div class="form-group">
						{{ Form::password('password', array('class' => 'form-control','placeholder' => 'Password')) }}
						<span class="text-danger">{{ $errors->first('password') }}</span>
					</div>
					{{ Form::submit('Register', array('class' => 'btn btn-sm btn-success btn-block' )) }}	
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@stop


@section('scripts')
<script>
// jQuery to enable register
var url = document.location.toString();
if (url.match('#')) {
	$('.btn-' + url.split('#')[1]).trigger('click');
} 
</script>
@stop

