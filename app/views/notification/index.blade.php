@extends('layouts/master')

@section('content')
<h1>Notifications Index</h1>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Message</th>
				<th>Link</th>
				<th class="text-center">Mark as view</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($notifications as $notification)
			
			<tr class="{{ $notification->seen?'':'success' }}">
				<td>{{ $notification->message }}</td>
				<td><span class="glyphicon glyphicon-calendar"></span> {{ link_to_route('event.show',$notification->event->name , array('event' => $notification->event_id ), null) }}</td>
				<td class="text-center">
					@if( ! $notification->seen)
					<a href="{{ Route('notification.seen',array('id' => $notification->id )) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
					@endif
				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
</div>

@stop

