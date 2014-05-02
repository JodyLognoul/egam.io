@extends('layouts/master')

@section('content')
<div class="user-show">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>User <small>- {{ $user->name.' '.$user->surname }}</small></h3>
		</div>
		<div class="panel-body">
			<span class="glyphicon glyphicon-picture"></span> {{ HTML::image('images/user.png', $user->image, array('class' => 'img-responsive img-thumbnail')) }}
			<p><span class="glyphicon glyphicon-user"></span> {{ $user->username }}</p>
			<p><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
		</div>
		<div class="panel-footer">
			{{ link_to_route('party.index','Back to the list',null, array('class' => 'btn btn-info btn-block')) }}
		</div>
	</div>
</div>
@stop
