<?php


class Party extends Eloquent{
	
	public function address()
    {
        return $this->belongsTo('Address');
    }

}

