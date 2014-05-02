<?php

use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function($table){
			
			// Fields			
			$table->increments('id');			
			$table->string('message');							// message
			$table->boolean('seen')->default(false);			// confirmed
			$table->integer('event_id')->unsigned();			// event_id
			$table->integer('user_id')->unsigned();				// user_id

			// Foreign Key
			$table->foreign('user_id')->references('id')->on('users');		
			$table->foreign('event_id')->references('id')->on('events');		

			// Other
			$table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notifications');
	}

}