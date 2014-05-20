<?php

class EventController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// App::make('Notify')->notifyHost(Event::find(1), 'Your event as been list!');
		
		return View::make('event/index')->with('test','SALUT LOL!');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function indexMap()
	{
		return View::make('event/index-map');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('event/new')->with('uniqid',uniqid('event_'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::all();		

		$rules = array(
			'title' 			=> 'required|min:8|max:64',
			'description' 		=> 'required|min:16|max:1024',
			'uniqid'			=> 'required',
			'event_date'		=> 'required|after:now',
			'max_place' 		=> 'required',
			'address_full'		=> 'required|min:8'
		);

		$validation = Validator::make($inputs, $rules);
		if ($validation->fails())
		{
			$fails = $validation->messages();
			$collapse = 
						$fails->has('max_place') 		? '#social':
						$fails->has('event_date') 		? '#date':
						$fails->has('pictures') 		? '#pictures':
						$fails->has('address_full') 	? '#address':
						$fails->has('description') 		? '':
						$fails->has('title') 			? '':
						'';

			
			Input::flash();
			return Redirect::to(URL::route('event.create').$collapse)->withErrors($validation);
		}

		// Get event
		$event = new Event;
		$event->title = $inputs['title'];
		$event->description = $inputs['description'];
		$event->current_place = 1;
		$event->max_place = $inputs['max_place'];
		$event->event_date = new DateTime($inputs['event_date']);
		$event->event_time = new DateTime($inputs['event_date']);


		// Get address 
		$address = new Address;		
		$address->full = $inputs['address_full'];
		// $address->str_name = $inputs['route'];
		// $address->str_no   = $inputs['street_number'];
		// $address->cp       = $inputs['postal_code'];
		// $address->city     = $inputs['locality'];
		// $address->country  = $inputs['country'];
		$address->save();

		// Link address -> event
		$event->address()->associate($address);				
		$event->save();

		// Link current user -> event as HOST
		$event->users()->attach( Auth::user(),array('role' => 'host' ) );
		$event->save();

		// Link pictures
		$folder = $inputs['uniqid'];
		
		$pictures = Picture::where('folder',$folder)->get();
		foreach ($pictures as $picture) {
			$picture->event_id = $event->id;
			$picture->save();
		}

		return Redirect::route('homepage')->with('message', '<span class="glyphicon glyphicon-ok"></span>  Your eventis well published! See the details <a href="#" class="alert-link">here</a> !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$event = Event::find($id);			
		return View::make('event/show',compact('event'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event = Event::find($id);
		return View::make('event/edit',compact('event'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$inputs = Input::all();		

		$rules = array(
			'title' 			=> 'min:8|max:64',
			'description' 		=> 'min:16|max:1024',
			'uniqid'			=> '',
			'event_date'		=> 'after:now',
			'max_place' 		=> '',
			'address_full'		=> 'min:8'
		);

		$validation = Validator::make($inputs, $rules);
		if ($validation->fails())
		{
			$fails = $validation->messages();
			$modal = 
					$fails->has('max_place') 		? '#social':
					$fails->has('event_date') 		? '#date':
					$fails->has('pictures') 		? '#pictures':
					$fails->has('address_full') 	? '#address':
					$fails->has('description') 		? 'description':
					$fails->has('title') 			? 'title':
					'';
			
			Input::flash();
			return Redirect::route('event.show',array('id' => $id))->withErrors($validation)->with('modal', $modal);
		}
			
		$event = Event::find($id);
		if (Input::has('title'))
		{
			$event->title = Input::get('title');
		}
		if (Input::has('description'))
		{
			$event->description = Input::get('description');
		}
		$event->save();
		return Redirect::route('event.show', array('event' => $id))->with('message', 'The event updated successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Join a event
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function join($event_id)
	{
		$event = Event::find( $event_id );

		if ($event->takePart(Auth::user()->id) ) {
			return Redirect::route('event.show',array('event' => $event_id))->with('error', 'You are already in this event!');
		}else{
			$event->users()->attach( Auth::user(),array('role' => 'guest' ) );
			$event->save();
		}

		return Redirect::route('event.show',array('event' => $event_id))->with('message', '<span class="glyphicon glyphicon-ok"></span>  You successfully joined the event!');
	}
	/**
	 * Remove an user from an event
	 *
	 * @param  int  $id, int $uid
	 * @return Response
	 */
	public function removeUser($event_id, $uid)
	{
		$event = Event::find( $event_id );

		if ($event->isHost(Auth::user()->id) ) {
			return Redirect::route('event.show',array('event' => $event_id))->with('error', 'You are already in this event!');
		}else{
			$event->users()->detach(Auth::user()->id);
			$event->save();
		}
		// return Redirect::route('event.show',array('event' => $event_id))->with('message', '<span class="glyphicon glyphicon-ok"></span>  You have left this event!');
		return Redirect::back()->with('message', '<span class="glyphicon glyphicon-ok"></span>  You have left this event!');
	}

}