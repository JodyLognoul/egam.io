<?php


class Party extends Eloquent{
	
	public function address()
    {
        return $this->belongsTo('Address');
    }

    public function users()
    {
        return $this->belongsToMany('User');
    }
}

