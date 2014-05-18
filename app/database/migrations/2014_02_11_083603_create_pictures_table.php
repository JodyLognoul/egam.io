<?php

use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pictures', function($table){
			
			// Fields			
			$table->increments('id');			
			$table->string('url')->nullable();				// url
			$table->string('path')->nullable();				// path
			$table->string('name');							// name
			$table->string('folder');						// folder

			$table->integer('event_id')->unsigned()->nullable();		// event_id

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
		Schema::drop('pictures');
	}

}