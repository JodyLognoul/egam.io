<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function($table)
		{
			$table->increments('id');						// id
			$table->string('title');						// title
			$table->text('description');					// description
			$table->datetime('event_datetime');					// event_datetime
			$table->integer('max_places'); 					// max_place
			$table->integer('current_place'); 				// current_place			
			$table->string('status')->default('PENDING'); 	// status			
			$table->integer('address_id')->unsigned();		// address_id

			$table->foreign('address_id')->references('id')->on('addresses');

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
		Schema::drop('events');
	}

}