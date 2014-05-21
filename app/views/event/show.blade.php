@extends('layouts/master')

@section('styles')

{{ HTML::style("js/vendor/lightbox/css/lightbox.css") }}

@stop

@section('content')

<div class="event-show">
	@if( $event->isHost(Auth::user()))
	<div class="alert alert-warning alert-dismissable alert-info-ind">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<p><i class="glyphicon glyphicon-info-sign"></i> Your are the <strong>host</strong> of this event. If you want to modify some informations, use the button <button class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></button> above each informations.</p>
	</div>
	@endif
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Event Detail - <i>{{ $event->title}}</i><i class="glyphicon glyphicon-eye-open pull-right"></i></h3>
		</div>
		<div class="panel-body row event-show-infos">
			<div class="col-md-4"><!-- **************************************** COLLONE 1 **************************************** -->
				<div id="title-section"><!-- title-section -->
					<h4>Title
						@if( $event->isHost(Auth::user()))
						<a href="" data-toggle="modal" data-target="#modal-modify-title" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the title"><i class="glyphicon glyphicon-pencil"></i></a>
						@endif
					</h4>
					<p>{{ $event->title }}</p>
				</div>
				<div id="description-section"><!-- description-section -->
					<h4>Description
						@if( $event->isHost(Auth::user()))
						<a href="" data-toggle="modal" data-target="#modal-modify-description" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the description"><i class="glyphicon glyphicon-pencil"></i></a>
						@endif
					</h4>
					<p>{{ $event->description }}</p>
				</div>
				<div id="max-places-section"><!-- max-places-section -->
					<h4>
						Place(s) available(s)
						@if( $event->isHost(Auth::user()))
						<a href="" data-toggle="modal" data-target="#modal-modify-max-places" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the number of places"><i class="glyphicon glyphicon-pencil"></i></a>
						@endif
					</h4>
					<p>{{ $event->max_places }}</p>
				</div>
				<div id="host-section"><!-- host-section -->
					@if( ! $event->isHost(Auth::user()))
					<h4>Host</h4>
					<ul>
						<li>
							<a class="" data-toggle="modal" data-target="#myModal_{{ $event->host()->id }}">{{ $event->host()->username }}</a>
						</li>
					</ul>
					@endif
				</div>
				<div id="guests-section"><!-- guests-section -->
					{{ $event->guestsQty() > 0 ? '<h4>Guest(s)</h4>' : '' }} 
					<ul>
						@foreach($event->guests() as $i => $guest)
						<li>
							<a class="" data-toggle="modal" data-target="#myModal_{{ $guest->id }}">{{ $guest->username }}</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div id="options-section"><!-- options-section -->
					<h4>Options</h4>
					@if( $event->isHost(Auth::user()))
					<a href="" data-toggle="modal" data-target="#modal-event-cancel" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel the event</a>
					@elseif($event->isGuest(Auth::user()))
					<a href="" data-toggle="modal" data-target="#modal-event-leave" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-log-out"></i> Leave the event</a>
					@else
					<a href="" data-toggle="modal" data-target="#modal-event-join" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-log-in"></i> Join the event</a>
					@endif
				</div>
			</div>
			<div class="col-md-4"><!-- **************************************** COLLONE 2 **************************************** -->
				<div id="date-section"><!-- date-section -->
					<h4>Date
						@if( $event->isHost(Auth::user()))
						<a href="" data-toggle="modal" data-target="#modal-modify-datetime" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the date"><i class="glyphicon glyphicon-pencil"></i></a>
						@endif
					</h4>
					<p>{{ $event->eventDate() }}</p>
					<p class="datetime-remaining"></p>
				</div>
				<div id="time-section"><!-- time-section -->
					<h4>Time
						@if( $event->isHost(Auth::user()))
						<a href="" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the time"><i class="glyphicon glyphicon-pencil"></i></a>
						@endif
					</h4>
					<p>{{ $event->eventTime() }}</p>
				</div>
				<div id="pictures-section"><!-- pictures-section -->
					<h4>Pictures
						@if( $event->isHost(Auth::user()))
						<a href="" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the pictures"><i class="glyphicon glyphicon-pencil"></i></a>
						@endif
					</h4>
					<div id="carousel-generic-event" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach ($event->pictures as $picture)
							<li data-target="#carousel-generic-event" data-slide-to="{{ $picture->id }}" class="active"></li>
							@endforeach
						</ol>
						<div class="carousel-inner">
							@foreach ($event->pictures as $i => $picture)
							<div class="item {{$i == 0?'active':''}}"><a href="{{ $picture->url }}md.jpeg" data-lightbox="image-1" data-title="My caption"><img src="{{ $picture->url }}sm.jpeg" alt="@{{ title }}" class="img-responsive"></a></div>
							@endforeach
						</div>
						<a class="left carousel-control" href="#carousel-generic-event" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-generic-event" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-4"><!-- **************************************** COLLONE 3 **************************************** -->
				<h4>Address
					@if( $event->isHost(Auth::user()))
					<a href="" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the address"><i class="glyphicon glyphicon-pencil"></i></a>
					@endif
				</h4>
				<p><a href="http://www.google.com/maps?q={{ $event->address->full}}" target="_blank" class="text-info">{{ $event->address->full}} </a></p>
				<h4>Map</h4>
				<p>{{ HTML::image('images/mapmap.png', $event->name, array('class' => 'img-responsive img-thumbnail')) }}</p>
			</div>

		</div>
		<div class="panel-footer-ind"><!-- Footer -->
			<a href="{{ route('event.index') }}" class="btn btn-sm btn-success">Back to the events list</a>
		</div>
	</div>
</div>

@include('event/modals/guest-of-event')
@include('event/modals/modify-title')
@include('event/modals/modify-description')
@include('event/modals/modify-max-places')
@include('event/modals/modify-datetime')
@include('event/modals/event-leave')
@include('event/modals/event-cancel')
@include('event/modals/event-join')

@stop

@section('scripts')
{{ HTML::script("js/vendor/lightbox/js/lightbox.min.js") }}
{{ HTML::script("js/vendor/moment/min/moment-with-langs.min.js") }}
<script>
	$('.datetime-remaining').show();
</script>

<script>
	@if( Session::has('modal') )
	$("#modal-modify-{{Session::get('modal')}}").modal('show');
	@endif
</script>
@stop

