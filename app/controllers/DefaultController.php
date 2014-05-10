<?php

class DefaultController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function landing()
	{
		// App::make('Notify')->notifyHost(Event::find(1), 'Your event as been list!');
		return View::make('default/landing');
	}
}