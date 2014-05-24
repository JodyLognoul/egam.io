@extends('layouts/master')

@section('styles')

{{ HTML::style("css/addresspicker.css") }}
{{ HTML::style("js/vendor/dropzone/downloads/css/basic.css") }}

@stop

@section('content')
<div class="event-new">
	<!-- start -->
	{{ Form::open(array('route' => 'event.store','class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">New Event<i class="fa fa-plus pull-right"></i></h3>
		</div>
		<div class="panel-group panel-group-lists collapse in" id="accordion2" style="height: auto;">
			<div class="panel"><!-- collapse-title -->
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-title" class="collapse-link-title collapsed">
							<i class="fa fa-tag"></i> Title and description
							<span class="badge pull-right">1</span>
						</a>
					</h4>
				</div>
				<div id="collapse-title" class="panel-collapse collapse in" style="height: auto;">
					<div class="panel-body">
						<!-- Title -->
						<div class="form-group">
							{{ Form::label('title', 'Title', array('class' => 'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::text('title', Input::old('title'), array('class' => 'form-control','placeholder' => 'My beautiful party ...','autofocus' => "")) }}
								<span class="help-block text-bordered">A block of help text that breaks onto a new line and may extend beyond one line.</span>
								<span class="text-danger">{{ $errors->first('title') }}</span>
							</div>
						</div>

						<!-- Description -->
						<div class="form-group">
							{{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::textarea('description', Input::old('Description'), array('class' => 'form-control','placeholder' => 'Join me for a nice moment ....','autofocus' => "",'rows' => '3')) }}
								<span class="help-block text-bordered">A block of help text that breaks onto a new line and may extend beyond one line.</span>
								<span class="text-danger">{{ $errors->first('description') }}</span>
							</div>
						</div>

						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-address" class="btn btn-warning pull-right btn-sm btn-next">
							Next <i class="fa fa-arrow-down"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="panel"><!-- collapse-address -->
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-address" class="collapse-link-address collapsed">
							<i class="fa fa-map-marker"></i> Address
							<span class="badge pull-right">2</span>
						</a>
					</h4>
				</div>
				<div id="collapse-address" class="panel-collapse collapse" style="height: auto;">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12 col-md-6">

								<div class="form-group">
									<!-- Name at the address -->
									<div class="col-sm-10">
										{{ Form::text('Name', Auth::user()->name.' '.Auth::user()->surname, array('class' => 'form-control input-address-name','placeholder' => 'The name at this address','autofocus' => "")) }}
										<span class="help-block text-bordered">The name at the address</span>
									</div>
								</div>
								<div class="form-group">
									<!-- Address -->
									<div class="col-sm-10">
										{{ Form::text('address_full', Input::old('address'), array('class' => 'input-address form-control','placeholder' => 'Ex: 42, rue sur la fontain 4000 Liège Belgique', 'autofocus' => "")) }}
										<span class="help-block text-bordered">The address where the event takes place</span>
										<span class="text-danger error-address">{{ $errors->first('address_full') }}</span>
									</div>
								</div>													
								<!-- Address Result -->
								<div class="form-group">
									<div class="address-result"></div>
								</div>

								<script class="address-success-script" type="text/template">
									<blockquote>
										<p><%= route.value %> <%= street_number.value %>, <%= postal_code.value %> <%= locality.value %> <%= country.value %></p>
									</blockquote>
								</script>
								<script class="address-errors-script" type="text/template">
									<span class="help-block text-bordered">Hummm this address is not precise enought :( Theses fields are missing :</span>
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
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-pictures" class="btn btn-warning pull-right btn-sm btn-next">
								Next <i class="fa fa-arrow-down"></i>
							</a>

						</div>
					</div>
				</div>
				<div class="panel"><!-- collapse-pictures -->
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-pictures" class="collapse-link-pictures">
								<i class="fa fa-photo"></i> Pictures
								<span class="badge pull-right">3</span>
							</a>
						</h4>
					</div>
					<div id="collapse-pictures" class="panel-collapse collapse" style="height: auto;">
						<div class="panel-body">
							<div class="pictures-dest dropzone"></div>
							<input class="uniqid" type="hidden" name="uniqid" value="{{ $uniqid }}">
	
							<!-- Next -->
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-date" class="btn btn-warning pull-right btn-sm btn-next">
								Next <i class="fa fa-arrow-down"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="panel"><!-- collapse-date -->
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-date" class="collapse-link-date">
								<i class="fa fa-calendar-o"></i> Date and time
								<span class="badge pull-right">3</span>
							</a>
						</h4>
					</div>
					<div id="collapse-date" class="panel-collapse collapse" style="height: auto;">
						<div class="panel-body">
							<!-- Event Date -->
							<div class="form-group">
								<div class="col-sm-1">
									<a class="datetimepicker btn btn-success btn-lg"><i class="fa fa-calendar"></i></i><input type="hidden"></a>
								</div>
								<div class="col-sm-11">
									<div class="dest-date-time"></div>
									<span class="help-block text-bordered">Use the button <i class="fa fa-calendar"></i> to choose the date and time of your event.</span>
									<span class="text-danger error-date">{{ $errors->first('event_datetime') }}</span>
									{{ Form::hidden('event_datetime', Input::old('event_datetime'), array('class' => 'form-control dest-datetime-input','placeholder' => '','autofocus' => "")) }}
								</div>
							</div>

							<!-- Next -->
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-social" class="btn btn-warning pull-right btn-sm btn-next">
								Next <i class="fa fa-arrow-down"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="panel"><!-- collapse-social -->
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-social" class="collapse-link-social">
								<i class="fa fa-users"></i> Social 
								<span class="badge pull-right">4</span>
							</a>
						</h4>
					</div>
					<div id="collapse-social" class="panel-collapse collapse" style="height: auto;">
						<div class="panel-body">
							<!-- Max places -->
							<div class="row">
								{{ Form::label('max_places', 'Max Places', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-10">
									{{ Form::selectRange('max_places', 1, 27, null, array('class' => 'form-control','autofocus' => "")) }}
									<span class="help-block text-bordered">A block of help text that breaks onto a new line and may extend beyond one line.</span>
									<span class="text-danger">{{ $errors->first('max_places') }}</span>
								</div>
							</div>	
							<!-- Next -->
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-privacy" class="btn btn-warning pull-right btn-sm btn-next">
								Next <i class="fa fa-arrow-down"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="panel"><!-- collapse-privacy -->
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-privacy" class="collapse-link-privacy">
								<i class="fa fa-eye"></i> Privacy
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
								Next <i class="fa fa-arrow-down"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="panel"><!-- collapse-end -->
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion2" href="#collapse-end" class="collapse-link-end">
								<i class="fa fa-check"></i> Finish 
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

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI31ZBJbrhST7-RK-crm0XC2wY6vNlj7I&sensor=true&libraries=places" type="text/javascript"></script> -->
{{ HTML::script("js/vendor/typeahead.js/dist/typeahead.bundle.js") }}
{{ HTML::script("js/vendor/addresspicker/typeahead-addresspicker.js") }}
{{ HTML::script("js/vendor/underscore-amd/underscore-min.js") }}
{{ HTML::script("js/vendor/dropzone/downloads/dropzone.min.js") }}
{{ HTML::script("js/addressPickerInd.js") }}

<script>
var inputDatetime = $('.dest-datetime-input').val();
if( inputDatetime ){
	var day = moment(inputDatetime);
	$('.dest-date-time').html('<blockquote><p>' + day.format("dddd, Do MMMM YYYY") + '</p><footer>' + day.format("h:mm a") + '</footer></blockquote><blockquote><p class="dest-datetime-rem"><i class="fa fa-clock-o"></i> ' + day.fromNow() + '</p></blockquote>');
}
$('.datetimepicker').datetimepicker({
	minDate: moment().format(),
	defaultDate: moment($('.dest-datetime-input').val()).format(),
	minuteStepping: 5,
    language: 'en',
	icons: {
	    time: "fa fa-clock-o",
	    date: "fa fa-calendar",
	    up: "fa fa-arrow-up",
	    down: "fa fa-arrow-down"
	}
}).on("dp.change",function (e) {
	var day = moment(e.date._d);
	$('.error-date').empty();
	$('.dest-date-time').html('<blockquote><p>' + day.format("dddd, Do MMMM YYYY") + '</p><footer>' + day.format("h:mm a") + '</footer></blockquote><blockquote><p class="dest-datetime-rem"><i class="fa fa-clock-o"></i> ' + day.fromNow() + '</p></blockquote>');
	$('.dest-datetime-input').val(day.format());
});
</script>
<script>
// Dropzone
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div.pictures-dest", { 
	url: "/picture" ,
	addRemoveLinks: true
});

myDropzone.on("sending", function(file, xhr, formData) {
  formData.append("uniqid", $('.uniqid').val());
});

</script>

<script>
// jQuery to enable register
var url = document.location.toString();
if (url.match('#')) {
	$('.collapse-link-' + url.split('#')[1]).trigger('click');
} 
</script>

@stop

