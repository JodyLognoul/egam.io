@extends('layouts/master')

@section('content')


{{ Form::open(array('route' => 'party.store','class' => 'form-party-new form-horizontal', 'role' => 'form')) }}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Party <small>- new</small></h3>
	</div>
	<div class="panel-body">

	<!-- Name -->
	
	
	{{ Form::label('name', 'Name of the party') }}
	<span class="pull-right label label-info">1/5</span>
	
	<div class="well">
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder' => 'My beautiful party ...','autofocus' => "")) }}
		<span class="text-danger">{{ $errors->first('name') }}</span>
	</div>

	<!-- Description -->
	{{ Form::label('description', 'Description of the party') }}
	<span class="pull-right label label-info">2/5</span>
	<div class="well">
		{{ Form::textarea('description', Input::old('Description'), array('class' => 'form-control','placeholder' => 'Join me for a nice moment ....','autofocus' => "",'rows' => '3')) }}
		<span class="text-danger">{{ $errors->first('description') }}</span>
	</div>

	<!-- Address -->
	{{ Form::label('address', 'Address') }}
	<span class="pull-right label label-info">3/5</span>
	<div class="well">
		{{ Form::textarea('address', Input::old('address'), array('class' => 'form-control','placeholder' => '42, rue sur la fontain 4000 Liège Belgique','autofocus' => "",'rows' => '2')) }}
		<span class="text-danger">{{ $errors->first('Address') }}</span>
	</div>

	<!-- partydate -->
	{{ Form::label('partydate', 'Date of the party') }}
	<span class="pull-right label label-info">4/5</span>
	<div class="well">
		{{ Form::selectRange('partydate-day', 1, 31, null, array('class' => 'form-control','autofocus' => "")) }}
		{{ Form::selectMonth('partydate-month', Input::old('partydate-month'), array('class' => 'form-control')) }}
		{{ Form::selectRange('partydate-year', 2013, 2014, null, array('class' => 'form-control','autofocus' => "")) }}
		<span class="text-danger">{{ $errors->first('partydate') }}</span>
	</div>
	
	<!-- Max places -->	
	{{ Form::label('maxplaces', 'Places evailables') }}
	<span class="pull-right label label-info">5/5</span>
	<div class="well">
		{{ Form::selectRange('maxplaces', 1, 27, null, array('class' => 'form-control','autofocus' => "")) }}
	</div>
	<span class="text-danger">{{ $errors->first('maxplaces') }}</span>


	<!-- submit -->
	{{ Form::submit('Create', array('class' => 'btn btn-primary btn-block' )) }}
	{{ link_to_route('party.index','Back to the list', null, array('class' => 'btn btn-default btn-block')) }}
	</div>
</div>

{{ Form::close() }}

@stop

