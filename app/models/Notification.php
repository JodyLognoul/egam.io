<?php


class Notification extends Eloquent{

	public function event()
	{
		return $this->belongsTo('Event');
	}
	
	public function belongsToUser(User $u){
		return $this->user_id == $u->id;
	}

	public function setSeen(User $u){
		if ($this->belongsToUser($u)) {
			$this->seen = true;
		}
	}
	
}

