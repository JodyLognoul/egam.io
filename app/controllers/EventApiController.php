<?php

class EventApiController extends BaseController {

	public function index()
	{
		return Event::with(array(
			'event_user' => function($query)
			{
				$query->where('role','host');
			},
			'address'))
		->where('status','like','PENDING')
		->get()
		->toJson();
	}
	public function show($eid){
		return Event::with(array(
			'event_user' => function($query)
			{
				$query->where('role','host');
			},
			'address'))
		->where('id', $eid)
		->where('status','like','PENDING')
		->first()
		->toJson();
	}
}