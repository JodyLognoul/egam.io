<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $guarded = array('id', 'password');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public function getImageAttribute(){
		if(! $this->attributes['image'] ){
			return 'http://www.gravatar.com/avatar/' . md5($this->attributes['image']) . '?s=32';
		}
		return $this->attributes['image']; 
	}

	public function unreadNotificationsQty(){
		$qty = DB::table('notifications')
		->where('user_id',$this->id)
		->where('seen',false)
		->count();
		return $qty!=0 ? $qty : '';
	}


	/**
	 * Get events I'm the host
	 *
	 * @return array
	 */
	public function eventsHost()
	{
		return $this->belongsToMany('Event')->where('role','like','host');
	}

	/**
	 * Get events I'm the guest
	 *
	 * @return array
	 */
	public function eventsGuest()
	{
		return $this->belongsToMany('Event')->where('role','like','guest');
	}


	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	// http://stackoverflow.com/questions/23094374/laravel-unexpected-error-class-user-contains-3-abstract-methods
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}

}