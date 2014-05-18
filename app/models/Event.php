<?php

class Event extends Eloquent{
	
    public function getEventTimeAttribute( $value ){
        return date("H:i", strtotime( $value ));
    }
    public function pictures(){
        return $this->hasMany('Picture');
    }
	public function address()
    {
        return $this->belongsTo('Address');
    }

    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function event_user()
    {
        return $this->belongsToMany('User');
    }

    public function guests()
    {
        return $this->belongsToMany('User')
                    ->withPivot('role')
                    ->where('role', 'guest')
                    ->get();
    }

    public function host()
    {
    	return $this->belongsToMany('User')
    				->withPivot('role')
    				->where('role', 'host')
    				->first();
    }
    public function isGuest($userid){
        foreach ($this->guests() as $guest) {
            if( $guest->id == $userid){
                return true;
            }
        }
        return false;
            
    }
    public function isHost($userid){
        return $this->host()->id == $userid;
    }
    public function takePart($userid){
        return $this->isHost($userid)||$this->isGuest($userid);
    }
}

