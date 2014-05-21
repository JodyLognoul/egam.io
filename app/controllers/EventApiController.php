<?php

class EventApiController extends BaseController {

	public function getIndex()
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
}