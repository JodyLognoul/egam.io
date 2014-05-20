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
    public function isGuest(User $user){
        foreach ($this->guests() as $guest) {
            if( $guest->id == $user->id){
                return true;
            }
        }
        return false;
            
    }
    public function isHost(User $user){
        return $this->host()->id == $user->id;
    }
    public function takePart(User $user){
        return $this->isHost($user) || $this->isGuest($user);
    }
}

