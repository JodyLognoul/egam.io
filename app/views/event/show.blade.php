@extends('layouts/master')

@section('content')
<div class="event-show">
	<div class="panel panel-success"><!-- Informations -->
		<div class="panel-heading">
			<h3 class="panel-title">Event Detail - <i>{{ $event->title}}</i><i class="glyphicon glyphicon-eye-open pull-right"></i></h3>
		</div>
		<div class="panel-body row">
			<div class="col-md-4"><!-- Col 1 -->
				<h4><i class="glyphicon glyphicon-tag"></i> Title</h4>
				<p class="title">{{ $event->title }}</p>
				<h4><i class="glyphicon glyphicon-pencil"></i> Description</h4>
				<p>{{ $event->description }}</p>
				<h4><i class="glyphicon glyphicon-user"></i> Place(s) available(s)</h4>
				<p>{{ $event->current_place }}</p>
				<h4><i class="glyphicon glyphicon-home"></i> Host</h4>
				<p><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal_{{ $event->host()->id }}">{{ $event->host()->username }}</button></p>
				<h4><i class="glyphicon glyphicon-check"></i> Guest(s)</h4>
				@foreach($event->guests() as $guest)
				<p>
					<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_{{ $guest->id }}">{{ $guest->username }}</button>
				</p>
				@endforeach
			</div>
			<div class="col-md-4"><!-- Col 2 -->
				<h4><i class="glyphicon glyphicon-calendar"></i> Date</h4>
				<p>{{ $event->event_date }}</p>
				<h4><i class="glyphicon glyphicon-time"></i> Time</h4>
				<p>{{ $event->event_time }}</p>
				<h4><i class="glyphicon glyphicon-picture"></i> Pictures</h4>
				{{ HTML::image('images/got.jpg', $event->name, array('class' => 'img-responsive img-thumbnail')) }}
			</div>
			<div class="col-md-4"><!-- Col 3 -->
				<h4><i class="glyphicon glyphicon-globe"></i> Address</h4>
				<p><a href="http://www.google.com/maps?q={{ $event->address->full}}" target="_blank" class="text-info">{{ $event->address->full}} </a></p>
				<h4><i class="glyphicon glyphicon-map-marker"></i> Map</h4>
				<p>{{ HTML::image('images/mapmap.png', $event->name, array('class' => 'img-responsive img-thumbnail')) }}</p>
			</div>

		</div>
		<div class="panel-footer-ind"><!-- Footer -->
				<a href="{{ URL::previous() }}" class="btn btn-sm btn-success">Back</a>
				@if( Auth::check() && !$event->takePart(Auth::user()->id) )
				{{ link_to_route('event.join','Join the party',array('id' => $event->id), array('class' => 'btn btn-sm btn-warning')) }}
				@endif
		</div>
	</div>

</div>


{{ $modalGuestsEvent }}
@stop

