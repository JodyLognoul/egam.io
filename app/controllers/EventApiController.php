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
		->get()
		->toJson();
	}
	public function getIndexFitler()
	{
		return Event::with(array(
			'event_user' => function($query)
			{
				$query->where('role','host');
			},
			'address'))
		->where('title','Petite soirée jeu entre amis et autres!')
		->Where('id','1')
		->get()
		->toJson();
	}
}