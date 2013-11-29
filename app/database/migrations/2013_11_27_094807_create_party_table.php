<?php

use Illuminate\Database\Migrations\Migration;

class CreatePartyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parties', function($table)
		{
			$table->increments('id');						// id
			$table->string('name');							// name
			$table->string('description');					// description
			$table->string('party_date');					// party_date
			$table->string('party_time');					// party_time
			$table->integer('max_place'); 					// max_place
			$table->integer('current_place'); 				// current_place			
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
		Schema::drop('parties');
	}

}