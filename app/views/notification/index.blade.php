@extends('layouts/master')

@section('content')
<div class="notification-index">
	
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">My Notifications <i class="glyphicon glyphicon-exclamation-sign pull-right"></i></h3>
		</div>
		<div class="panel-body">
			<ul class="list-group">
				<div class="row">
					<h4 class="col-md-5">Message</h4>
					<h4 class="col-md-5">Event</h4>
					<h4 class="col-md-2 text-center">Set as seen</h4>
				</div>
				@foreach ($notifications as $notification)
				<li class="list-group-item {{ $notification->seen?'':'list-group-item-warning' }}">
					<div class="row">
						<div class="col-md-5">
							{{ $notification->message }}
						</div>
						<div class="col-md-5">
							<a href="{{ URL::route('event.show',array('event' => $notification->event->id )) }}">{{ $notification->event->title }}</a>
						</div>
						<div class="col-md-2 text-center">
							@if( ! $notification->seen)
							<a href="{{ Route('notification.seen',array('id' => $notification->id )) }}"><i class="glyphicon glyphicon-eye-open"></i></a>
							@endif
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>

	</div>
</div>

@stop

