<?php

class NotificationController extends \BaseController {

	/**
	 * Notify the host of the event with the message in param
	 *
	 * @return Response
	 */
	public function notifyHost(Event $event, $msg){
		$n = new Notification;
		$n->message = $msg;
		$n->event_id = $event->id;
		$n->user_id = $event->host()->id;
		$n->save();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$notifications = Notification::where('user_id',Auth::user()->id)
										->orderBy('seen')
										->get();
		return View::make('notification/index',compact('notifications'));
	}

	/**
	 * Mark the notification as seen
	 *
	 * @return redirect
	 */
	public function markAsSeen( $id )
	{
		$n = Notification::find( $id );
		$n->setSeen(Auth::user());
		$n->save();
		return Redirect::route('notification.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

}