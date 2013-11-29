@extends('layouts/master')

@section('content')
<h1>Show Party</h1>
<ul>
	<li>{{ $party->name }}</li>
	<li>{{ link_to_route('party.index','Back to the list') }}</li>
</ul>
@stop

