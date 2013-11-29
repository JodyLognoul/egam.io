<?php

use Illuminate\Database\Migrations\Migration;

class CreatePartyUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// USER
		Schema::create('party_user', function($table){

			// Fields
			$table->increments('id')->unsigned();			// id
			$table->string('role');							// role
			$table->integer('party_id')->unsigned();		// party_id
			$table->integer('user_id')->unsigned();			// user_id

			$table->foreign('party_id')->references('id')->on('parties');
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
		Schema::drop('party_user');
	}

}