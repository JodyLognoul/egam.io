<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// USER
		Schema::create('event_user', function($table){

			// Fields
			$table->increments('id')->unsigned();			// id
			$table->string('role');							// role
			$table->integer('event_id')->unsigned();		// event_id
			$table->integer('user_id')->unsigned();			// user_id

			$table->foreign('event_id')->references('id')->on('events');
			$table->foreign('user_id')->references('id')->on('users');

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
		Schema::drop('event_user');
	}

}