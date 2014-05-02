@extends('layouts/master')

@section('content')
<div class="event-new">
	<!-- start -->
	{{ Form::open(array('route' => 'event.store','class' => 'form-horizontal', 'role' => 'form')) }}

	<div class="panel-group panel-group-lists collapse in" id="accordion2" style="height: auto;">
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapsetitle" class="collapsed">
						<i class="glyphicon glyphicon-pencil"></i> Title and description
						<span class="badge pull-right">1</span>
					</a>
				</h4>
			</div>
			<div id="collapsetitle" class="panel-collapse collapse in" style="height: auto;">
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

					<a data-toggle="collapse" data-parent="#accordion2" href="#collapseAddress" class="btn btn-warning pull-right btn-sm">
						Next <i class="glyphicon glyphicon-arrow-down"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapseAddress" class="collapsed">
						<i class="glyphicon glyphicon-map-marker"></i> Address
						<span class="badge pull-right">2</span>
					</a>
				</h4>
			</div>
			<div id="collapseAddress" class="panel-collapse collapse" style="height: auto;">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<!-- Address -->
							{{ Form::textarea('address', Input::old('address'), array('class' => 'form-control','placeholder' => '42, rue sur la fontain 4000 Liège Belgique','autofocus' => "",'rows' => '6')) }}
							<span class="text-danger">{{ $errors->first('Address') }}</span>
						</div>
						<div class="col-xs-12 col-md-6">
							<img data-src="holder.js/140x140" class="img-thumbnail" alt="140x140" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+" style="width: 140px; height: 140px;">
						</div>
					</div>

					<!-- Next -->
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapseDate" class="btn btn-warning pull-right btn-sm">
						Next <i class="glyphicon glyphicon-arrow-down"></i>
					</a>

				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapseDate" class="">
						<i class="glyphicon glyphicon-calendar"></i> Date and time
						<span class="badge pull-right">3</span>
					</a>
				</h4>
			</div>
			<div id="collapseDate" class="panel-collapse collapse" style="height: auto;">
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
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapseSocial" class="btn btn-warning pull-right btn-sm">
						Next <i class="glyphicon glyphicon-arrow-down"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapseSocial" class="">
						<i class="glyphicon glyphicon-user"></i> Social 
						<span class="badge pull-right">4</span>
					</a>
				</h4>
			</div>
			<div id="collapseSocial" class="panel-collapse collapse" style="height: auto;">
				<div class="panel-body">
					<!-- Max places -->
					<div class="row">
						<div class="col-xs-1">
							{{ Form::selectRange('max_place', 1, 27, null, array('class' => 'form-control','autofocus' => "")) }}
							<span class="text-danger">{{ $errors->first('max_place') }}</span>

						</div>
					</div>	
					<!-- Next -->
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapsePrivacy" class="btn btn-warning pull-right btn-sm">
						Next <i class="glyphicon glyphicon-arrow-down"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapsePrivacy" class="">
						<i class="glyphicon glyphicon-eye-open"></i> Privacy
						<span class="badge pull-right">5</span>
					</a>
				</h4>
			</div>
			<div id="collapsePrivacy" class="panel-collapse collapse" style="height: auto;">
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
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapseEnd" class="btn btn-warning pull-right btn-sm">
						Next <i class="glyphicon glyphicon-arrow-down"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion2" href="#collapseEnd" class="">
						Finish 
						<span class="badge badge-success pull-right">end</span>
					</a>
				</h4>
			</div>
			<div id="collapseEnd" class="panel-collapse collapse in" style="height: auto;">
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
	{{ Form::close() }}	

	<!-- end -->
</div>
@stop

