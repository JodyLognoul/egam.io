@extends('layouts/master')

@section('styles')
    {{ HTML::style("css/addresspicker.css") }}
@stop

@section('content')
<div class="event-new">
	<!-- start -->
	{{ Form::open(array('route' => 'event.store','class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">New Event<i class="glyphicon glyphicon-plus pull-right"></i></h3>
		</div>
		<div class="panel-body">
			Panel content
		</div>
		<div class="panel-group panel-group-lists collapse in" id="accordion2" style="height: auto;">
			<div class="panel"><!-- collapse-title -->
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-title" class="collapse-link-title collapsed">
							<i class="glyphicon glyphicon-pencil"></i> Title and description
							<span class="badge pull-right">1</span>
						</a>
					</h4>
				</div>
				<div id="collapse-title" class="panel-collapse collapse in" style="height: auto;">
					<div class="panel-body">
						<!-- Title -->
						<div class="form-group">
							{{ Form::label('title', 'title', array('class' => 'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::text('title', Input::old('title'), array('class' => 'form-control','placeholder' => 'My beautiful party ...','autofocus' => "")) }}
								<span class="text-danger">{{ $errors->first('title') }}</span>
							</div>
						</div>

						<!-- Description -->
						<div class="form-group">
							{{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::textarea('description', Input::old('Description'), array('class' => 'form-control','placeholder' => 'Join me for a nice moment ....','autofocus' => "",'rows' => '3')) }}
								<span class="text-danger">{{ $errors->first('description') }}</span>
							</div>
						</div>

						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-address" class="btn btn-warning pull-right btn-sm btn-next">
							Next <i class="glyphicon glyphicon-arrow-down"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="panel"><!-- collapse-address -->
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-address" class="collapse-link-address collapsed">
							<i class="glyphicon glyphicon-map-marker"></i> Address
							<span class="badge pull-right">2</span>
						</a>
					</h4>
				</div>
				<div id="collapse-address" class="panel-collapse collapse" style="height: auto;">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<!-- Name at the address -->
								<span class="help-block">The name at the address</span>
								{{ Form::text('Name', Auth::user()->name.' '.Auth::user()->surname, array('class' => 'form-control input-address-name','placeholder' => 'The name at this address','autofocus' => "")) }}
								
								<!-- Address -->
								<span class="help-block">The address where the event takes place</span>
								{{ Form::text('address', Input::old('address'), array('class' => 'input-address form-control','placeholder' => 'Ex: 42, rue sur la fontain 4000 Liège Belgique','autofocus' => "")) }}
								<span class="text-danger">{{ $errors->first('Address') }}</span>
												
								<!-- Address Result -->
								<div class="address-result"></div>

								<script class="address-success-script" type="text/template">
									<span class="help-block">Perfect! The address will appear like that: </span>
									<blockquote>
										<p><%= route.value %> <%= street_number.value %>, <%= postal_code.value %> <%= locality.value %> <%= country.value %> <i class="glyphicon glyphicon-ok-sign text-success"></i></p>
									</blockquote>
								</script>
								<script class="address-errors-script" type="text/template">
									<span class="help-block">Hummm this address is not precise enought :( Theses fields are missing :</span>
									<ul class="address-errors text-danger">
										<% _.each(errors, function(error) { %> 
											<li><%= error.msg %></li>
										<% }); %>	
									</ul>
								</script>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="map-dest"></div>
							</div>
						</div>

						<!-- Next -->
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-date" class="btn btn-warning pull-right btn-sm btn-next">
							Next <i class="glyphicon glyphicon-arrow-down"></i>
						</a>

					</div>
				</div>
			</div>
			<div class="panel"><!-- collapse-date -->
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-date" class="collapse-link-date">
							<i class="glyphicon glyphicon-calendar"></i> Date and time
							<span class="badge pull-right">3</span>
						</a>
					</h4>
				</div>
				<div id="collapse-date" class="panel-collapse collapse" style="height: auto;">
					<div class="panel-body">
						<!-- Event Date -->
						<div class="form-group">
							{{ Form::label('event_date', 'Choose a date and the time', array('class' => 'col-sm-3 control-label')) }}
							<div class="col-sm-3">
								{{ Form::text('event_date', Input::old('event_date'), array('class' => 'form-control datetimepicker','placeholder' => '','autofocus' => "")) }}
								<span class="text-danger">{{ $errors->first('event_date') }}</span>
							</div>
						</div>

						<!-- Next -->
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-social" class="btn btn-warning pull-right btn-sm btn-next">
							Next <i class="glyphicon glyphicon-arrow-down"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="panel"><!-- collapse-social -->
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-social" class="collapse-link-social">
							<i class="glyphicon glyphicon-user"></i> Social 
							<span class="badge pull-right">4</span>
						</a>
					</h4>
				</div>
				<div id="collapse-social" class="panel-collapse collapse" style="height: auto;">
					<div class="panel-body">
						<!-- Max places -->
						<div class="row">
							<div class="col-xs-1">
								{{ Form::selectRange('max_place', 1, 27, null, array('class' => 'form-control','autofocus' => "")) }}
								<span class="text-danger">{{ $errors->first('max_place') }}</span>

							</div>
						</div>	
						<!-- Next -->
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-privacy" class="btn btn-warning pull-right btn-sm btn-next">
							Next <i class="glyphicon glyphicon-arrow-down"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="panel"><!-- collapse-privacy -->
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-privacy" class="collapse-link-privacy">
							<i class="glyphicon glyphicon-eye-open"></i> Privacy
							<span class="badge pull-right">5</span>
						</a>
					</h4>
				</div>
				<div id="collapse-privacy" class="panel-collapse collapse" style="height: auto;">
					<div class="panel-body">
						<label class="checkbox-inline">
							<input type="checkbox" id="inlineCheckbox1" value="option1"> 1
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" id="inlineCheckbox2" value="option2"> 2
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
						</label>
						<!-- Next -->
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-end" class="btn btn-warning pull-right btn-sm btn-next">
							Next <i class="glyphicon glyphicon-arrow-down"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="panel"><!-- collapse-end -->
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-end" class="collapse-link-end">
							<i class="glyphicon glyphicon-ok"></i> Finish 
							<span class="badge badge-success pull-right">end</span>
						</a>
					</h4>
				</div>
				<div id="collapse-end" class="panel-collapse collapse in" style="height: auto;">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12 text-center">
								{{ link_to_route('event.index','Back to the list', null, array('class' => 'btn btn-default')) }}
								{{ Form::submit('Create', array('class' => 'btn btn-success' )) }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	{{ Form::close() }}	

	<!-- end -->
</div>
@stop

@section('scripts')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI31ZBJbrhST7-RK-crm0XC2wY6vNlj7I&sensor=true&libraries=places" type="text/javascript"></script>
{{ HTML::script("js/vendor/typeahead.js/dist/typeahead.bundle.js") }}
{{ HTML::script("js/vendor/addresspicker/typeahead-addresspicker.js") }}
{{ HTML::script("js/vendor/underscore-amd/underscore-min.js") }}
{{ HTML::script("js/addressPickerInd.js") }}


<script>
// jQuery to enable register
var url = document.location.toString();
if (url.match('#')) {
	$('.collapse-link-' + url.split('#')[1]).trigger('click');
} 
</script>

@stop

