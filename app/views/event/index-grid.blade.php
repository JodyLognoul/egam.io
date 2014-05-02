@extends('event/index-master')

@section('events')


<!-- Result -->
<div class="row">
	@foreach ($events as $event)
	<div class="elem col-sm-6 col-md-3">
		<div class="thumbnail">
			<div id="carousel-generic{{ $event->id }}" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-generic{{ $event->id }}" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-generic{{ $event->id }}" data-slide-to="1" class=""></li>
					<li data-target="#carousel-generic{{ $event->id }}" data-slide-to="2" class=""></li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">{{ HTML::image('images/got.jpg', $event->title, array('class' => 'img-responsive')) }}</div>
					<div class="item">{{ HTML::image('images/carcassonne.jpg', $event->title, array('class' => 'img-responsive')) }}</div>
					<div class="item">{{ HTML::image('images/elixir.jpg', $event->title, array('class' => 'img-responsive')) }}</div>
				</div>
				<a class="left carousel-control" href="#carousel-generic{{ $event->id }}" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-generic{{ $event->id }}" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
			<div class="row date-n-host">
				<div class="col-md-4">
					<span class="label label-primary pull-left">{{ date("d M Y", strtotime($event->event_date)) }}</span>
				</div>
				<div class="col-md-8">
					<span class="label label-warning pull-right">						
						{{ $event->host()->username }}
					</span>
				</div>
			</div>

			<div class="caption text-center">
				<h3><span class="glyphicon glyphicon-tag"></span> {{ $event->title }}</h3>
				<p><span class="glyphicon glyphicon-map-marker"></span> <a href="http://www.google.com/maps?q={{ $event->address->full}}" target="_blank" class="text-info">{{ $event->address->full}}</a></p>
				<p><span class="glyphicon glyphicon-time"></span> {{ date("H:i", strtotime($event->event_date)) }}</p>
				<p><span class="glyphicon glyphicon-user"></span> {{ $event->current_place }}</p>
				<p><a href="{{ URL::to('event', array('id' => $event->id )) }}" class="btn btn-success btn-xs btn-block" role="button">View</a></p>
			</div>
		</div>
	</div>

	@endforeach
</div>

@stop
