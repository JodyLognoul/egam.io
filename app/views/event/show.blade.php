@extends('layouts/master')

@section('content')
<div class="party-show">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Show Party <small>- {{ $event->name }}</small>
			@if(Auth::check() && $event->host()->id == Auth::user()->id )			
				<a data-toggle="tooltip" title="Hey! You are the host of this party!" class="pull-right gg-tooltip"><span class="text-primary glyphicon glyphicon-star"></span></a>
			@elseif(Auth::check() && $event->takePart(Auth::user()->id) )
				<a data-toggle="tooltip" title="Hey! You take part of this party!" class="pull-right gg-tooltip"><span class="text-primary glyphicon glyphicon-star-empty"></span></a>
			@endif
			</h3>

		</div>
		<div class="panel-body">
			<ul class="list-group">
				<li class="list-group-item">
					{{ HTML::image('images/got.jpg', $event->name, array('class' => 'img-responsive img-thumbnail')) }}
				</li>
				<li class="list-group-item">
					<p class="text-muted pull-right">Place(s) available(s)</p>
					<span class="glyphicon glyphicon-user"></span> {{ $event->current_place }}
				</li>
				<li class="list-group-item">
					<p class="text-muted pull-right">Address</p>
					<span class="glyphicon glyphicon-map-marker"></span> <a href="http://www.google.com/maps?q={{ $event->address->full}}" target="_blank" class="text-info">{{ $event->address->full}} </a>
				</li>
				<li class="list-group-item">
					<p class="text-muted pull-right">Description</p>
					<span class="glyphicon glyphicon-pencil"></span> {{ $event->description }}
				</li>
				<li class="list-group-item">
					<p class="text-muted pull-right">Date</p>
					<span class="glyphicon glyphicon-calendar"></span> {{ date("d M Y", strtotime($event->event_date)) }}
				</li>
				<li class="list-group-item">
					<p class="text-muted pull-right">Hour</p>
					<span class="glyphicon glyphicon-time"></span> {{ $event->party_time }}
				</li>
				<li class="list-group-item">
					<p class="text-muted pull-right">Host</p>
					<span class="glyphicon glyphicon-eye-open"></span> {{ link_to_route('user.show',$event->host()->username, array('user' => $event->host()->id),null) }}
				</li>
				<li class="list-group-item">
					<p class="text-muted pull-right">Guest(s)</p>
					<span class="glyphicon glyphicon-list"></span> 
					@foreach($event->guests() as $guest)
						<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal_{{ $guest->id }}">{{ $guest->username }}</button>
					@endforeach		
				</li>
			</ul>
			
		</div>
		<div class="panel-footer">
			<div class="row">
				@if( Auth::check() && !$event->takePart(Auth::user()->id) )
					<div class="elem col-xs-12 col-sm-6">
						{{ link_to_route('event.join','Join the party',array('id' => $event->id), array('class' => 'btn btn-block btn-warning')) }}
					</div>
				@endif
				<div class="elem col-xs-12 col-sm-6">
					{{ link_to_route('event.index','Back to the list',null, array('class' => 'btn btn-block btn-info ')) }}
				</div>
			</div>
			
		</div>
	</div>
</div>
{{ $modalGuestsEvent }}
@stop

