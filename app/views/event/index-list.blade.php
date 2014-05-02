@extends('event/index-master')

@section('events')

<div class="table-responsive well">
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th><span class="glyphicon glyphicon-tag"></span> Title</th>
				<th><span class="glyphicon glyphicon-map-marker"></span> Address</th>
				<th><span class="glyphicon glyphicon-calendar gg-tooltip" data-toggle="tooltip" data-placement="top" data-original-title="Date"></span></th>
				<th><span class="glyphicon glyphicon-time gg-tooltip" data-toggle="tooltip" data-placement="top" data-original-title="Time"></span></th>
				<th><span class="glyphicon glyphicon-user gg-tooltip" data-toggle="tooltip" data-placement="top" data-original-title="Places"></span></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
				@foreach ($events as $event)

			<tr>
				<td>{{ $event->title }}</td>
				<td><a href="http://www.google.com/maps?q={{ $event->address->full}}" target="_blank" class="text-info">{{ $event->address->full}}</a></td>
				<td>{{ date("D d M Y", strtotime($event->event_date)) }}</td>
				<td>{{ date("H:i", strtotime($event->event_date)) }}</td>
				<td>{{ $event->current_place }}</td>
				<td><a href="{{ URL::to('event', array('id' => $event->id )) }}" class="btn btn-success btn-xs btn-block" role="button">View</a></td>
			</tr>
			
			@endforeach
		</tbody>
	</table>
</div>
@stop
