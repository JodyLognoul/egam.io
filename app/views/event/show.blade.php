@extends('layouts/master')

@section('styles')

{{ HTML::style("js/vendor/lightbox/css/lightbox.css") }}

@stop


@section('content')

<div class="event-show">
	@if( $event->isHost(Auth::user()))
	<div class="header-info well">
		<a href="" class="btn btn-xs btn-danger pull-right">Cancel the event</a>
		
		<p><i class="glyphicon glyphicon-info-sign"></i> Your are the host of this event. (To modify some fields, use the button <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-pencil"></i></a> )</p>
	</div>
	@endif
	<div class="panel panel-success"><!-- Informations -->
		<div class="panel-heading">
			<h3 class="panel-title">Event Detail - <i>{{ $event->title}}</i><i class="glyphicon glyphicon-eye-open pull-right"></i></h3>
		</div>
		<div class="panel-body row event-show-infos">
			<div class="col-md-4"><!-- Col 1 -->
				<h4>Title
					@if( $event->isHost(Auth::user()))
					<a href="" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the title"><i class="glyphicon glyphicon-pencil"></i></a>
					@endif
				</h4>
				<p>{{ $event->title }}</p>
				<h4>Description
					@if( $event->isHost(Auth::user()))
					<a href="" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the description"><i class="glyphicon glyphicon-pencil"></i></a>
					@endif
				</h4>
				<p>{{ $event->description }}</p>
				<h4>
					Place(s) available(s)
					@if( $event->isHost(Auth::user()))
					<a href="" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the number of places"><i class="glyphicon glyphicon-pencil"></i></a>
					@endif
				</h4>
				<p>{{ $event->current_place }}</p>
				<h4>Host</h4>
				<p><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal_{{ $event->host()->id }}">{{ $event->host()->username }}</button></p>
				<h4><i class="glyphicon glyphicon-check"></i> Guest(s)</h4>
				@foreach($event->guests() as $guest)
				<p>
					<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_{{ $guest->id }}">{{ $guest->username }}</button>
				</p>
				@endforeach
			</div>
			<div class="col-md-4"><!-- Col 2 -->
				<h4>Date
					@if( $event->isHost(Auth::user()))
					<a href="" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the date"><i class="glyphicon glyphicon-pencil"></i></a>
					@endif
				</h4>
				<p>{{ $event->event_date }}</p>
				<h4>Time
					@if( $event->isHost(Auth::user()))
					<a href="" class="btn btn-default btn-xs pull-right gg-tooltip" data-original-title="Modify the time"><i class="glyphicon glyphicon-pencil"></i></a>
					@endif
				</h4>
				<p>{{ $event->event_time }}</p>
				<!-- Pictures -->
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
			<div class="col-md-4"><!-- Col 3 -->
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
			<a href="{{ URL::previous() }}" class="btn btn-sm btn-success">Back</a>
			@if( Auth::check() && !$event->takePart(Auth::user()) )
			{{ link_to_route('event.join','Join the party',array('id' => $event->id), array('class' => 'btn btn-sm btn-warning')) }}
			@endif
		</div>
	</div>

</div>


{{ $modalGuestsEvent }}
@stop

@section('scripts')
{{ HTML::script("js/vendor/lightbox/js/lightbox.min.js") }}
@stop

