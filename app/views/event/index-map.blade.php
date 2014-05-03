@extends('layouts/master')


@section('styles')

<link href='https://api.tiles.mapbox.com/mapbox.js/v1.6.2/mapbox.css' rel='stylesheet' />

@stop


@section('content')

<div class="event-index-map">
	
	<h2 class="example-title">Events Index Map</h2>
	<!-- Search Input -->
	<!-- Filter -->
	<div class="row">
		<div class="col-md-12">
			<a href="{{ URL::to('/')}}" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-th"></i></a>
			<a type="button" class="datepicker btn btn-primary"><i class="glyphicon glyphicon-calendar"></i></a>
			<span class="dropdown">
				<button type="button" class="btn btn-primary" id="dmfilter" data-toggle="dropdown"><i class="glyphicon glyphicon-filter"></i></button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dmfilter">
					<li><a href="{{ URL::to('#/sort/az')}}">A-Z</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
				</ul>
			</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="map"></div>
		</div>
	</div>

@stop

@section('scripts')

<script data-main="js/app/event/index-map/main" src="js/vendor/requirejs/require.js"></script>

@stop




