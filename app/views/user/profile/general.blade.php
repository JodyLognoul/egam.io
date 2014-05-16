@extends('layouts/master')

@section('content')

@if( Session::has('profile-message') )
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{ Session::get('profile-message') }}
</div>
@endif
{{ Form::model(Auth::user(),array('files' => true ,'method' => 'put','route' => array('user.update', Auth::user()->id), 'class' => 'form-profile form-horizontal', 'role' => 'form')) }}

<div class="panel panel-primary profile">
	<div class="panel-heading">
		<h3 class="panel-title">My settings <i class="glyphicon glyphicon-cog pull-right"></i></h3>
	</div>
	<div class="panel-body row">
		<div class="col-md-4"><!-- Col 1 -->
			<h4><i class="glyphicon glyphicon-info-sign"></i> <span class="pull-right">My informations</span></h4>
			<!-- Picture -->
			<div class="form-group">
				{{ Form::label('picture', 'Picture',array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-4">
					<img src="{{ Auth::user()->image }}" class="img-rounded" height="100" alt="">
				</div>
			</div><!-- Surname -->
			<div class="form-group">
				{{ Form::label('surname', 'Surname',array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-9">
					{{ Form::text('surname', Input::old('surname'), array('class' => 'form-control','placeholder' => 'Surname','autofocus' => "")) }}
					<span class="text-danger">{{ $errors->first('surname') }}</span>
				</div>
			</div>
			<!-- Name -->
			<div class="form-group">
				{{ Form::label('name', 'Name',array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-9">
					{{ Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder' => 'Name','autofocus' => "")) }}
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>
			<!-- username -->
			<div class="form-group">
				{{ Form::label('username', 'Username',array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-9">
					{{ Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder' => 'Username','autofocus' => "")) }}
					<span class="text-danger">{{ $errors->first('username') }}</span>
				</div>
			</div>	
			<!-- Birthday -->
			<div class="form-group">
				{{ Form::label('birthday', 'Birthday',array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-9">
					{{ Form::text('birthday', Input::old('birthday'), array('class' => 'form-control','placeholder' => 'Birthday','autofocus' => "")) }}
					<span class="text-danger">{{ $errors->first('birthday') }}</span>
				</div>
			</div>	
			<!-- Birthday -->
			<div class="form-group">
				{{ Form::label('email', 'Email',array('class' => 'col-sm-3 control-label')) }}
				<div class="col-sm-9">
					{{ Form::email('email', Input::old('email'), array('class' => 'form-control','placeholder' => 'Email','autofocus' => "")) }}
					<span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
			</div>			
		</div>
		<div class="col-md-4"><!-- Col 2 -->
			<h4><i class="glyphicon glyphicon-star"></i><span class="pull-right">Events I'm the host</span></h4>
			<div class="myevents panel-group panel-group-lists collapse in" id="accordion2" style="height: auto;">
				@foreach (Auth::user()->eventsHost as $i => $event)
				<div class="panel">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" class="list-group-item-success" href="#collapse{{ $event->id }}">
								{{ $event->title }}
							</a>
						</h4>
					</div>
					<div id="collapse{{ $event->id }}" class="panel-collapse collapse">
						<div class="panel-body">
							<p><i class="glyphicon glyphicon-home"></i> {{ $event->host()->username }}</p>
							<p><i class="glyphicon glyphicon-globe"></i> {{ $event->address->full}}</p>
							<p><i class="glyphicon glyphicon-calendar"></i> {{ $event->event_date }}</p>
							<p><i class="glyphicon glyphicon-time"></i> {{ $event->event_time }}</p>
							<div class="row">
								<div class="myevents-actions col-md-12">
									<a href="{{ URL::to('event', array('id' => $event->id )) }}" class="gg-tooltip btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Open"><i class="glyphicon glyphicon-eye-open"></i></a>	
									<a href="" class="gg-tooltip btn btn-sm btn-info" data-toggle="tooltip" data-original-title="Edit"><i class="glyphicon glyphicon-edit"></i></a>	
									<a href="" class="gg-tooltip btn btn-sm btn-warning" data-toggle="tooltip" data-original-title="Share"><i class="glyphicon glyphicon-share"></i></a>	
									<a href="" class="gg-tooltip btn btn-sm btn-danger" data-toggle="tooltip" data-original-title="Cancel"><i class="glyphicon glyphicon-remove-circle"></i></a>	
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<h4><i class="glyphicon glyphicon-star-empty"></i><span class="pull-right">Events I'm the guest</span></h4>
			<div class="myevents panel-group panel-group-lists collapse in" id="accordion2" style="height: auto;">
				@foreach (Auth::user()->eventsGuest as $i => $event)
				<div class="panel">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" class="list-group-item-info" href="#collapse{{ $event->id }}">
								{{ $event->title }}
							</a>
						</h4>
					</div>
					<div id="collapse{{ $event->id }}" class="panel-collapse collapse">
						<div class="panel-body">
							<p><i class="glyphicon glyphicon-home"></i> {{ $event->host()->username }}</p>
							<p><i class="glyphicon glyphicon-globe"></i> {{ $event->address->full}}</p>
							<p><i class="glyphicon glyphicon-calendar"></i> {{ $event->event_date }}</p>
							<p><i class="glyphicon glyphicon-time"></i> {{ $event->event_time }}</p>
							<div class="row">
								<div class="myevents-actions col-md-12">
									<a href="{{ URL::to('event', array('id' => $event->id )) }}" class="gg-tooltip btn btn-sm btn-primary" data-toggle="tooltip" data-original-title="Open"><i class="glyphicon glyphicon-eye-open"></i></a>	
									<a href="" class="gg-tooltip btn btn-sm btn-info" data-toggle="tooltip" data-original-title="Edit"><i class="glyphicon glyphicon-edit"></i></a>	
									<a href="" class="gg-tooltip btn btn-sm btn-warning" data-toggle="tooltip" data-original-title="Share"><i class="glyphicon glyphicon-share"></i></a>	
									<a href="{{ URL::route('event.remove.user', array('id' => $event->id, 'uid' => Auth::user()->id )) }}" class="gg-tooltip btn btn-sm btn-danger" data-toggle="tooltip" data-original-title="Leave"><i class="glyphicon glyphicon-log-out"></i></a>	
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="col-md-4"><!-- Col 3 -->

		</div>
	</div>
	<div class="panel-footer-ind"><!-- Footer -->
		{{ Form::submit('Save the modifications', array('class' => 'btn btn-sm btn-primary' )) }}
	</div>
</div>


@stop

