<?php


class Address extends Eloquent{

	public function parties(){
		return $this->hasMany('Event');
	}

}

