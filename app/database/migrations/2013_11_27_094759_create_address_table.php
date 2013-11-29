<?php

use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// ADDRESS
		Schema::create('addresses', function($table){

			// Options
			$table->engine = 'InnoDB';
			
			// Fields			
			$table->increments('id');			
			$table->string('country');						// country
			$table->string('str_name');						// str_name
			$table->string('str_no');						// str_no
			$table->string('cp');							// cp
			$table->string('city');							// city						

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
		Schema::drop('addresses');
	}

}