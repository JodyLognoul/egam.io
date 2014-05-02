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
			$table->string('country')->nullable();						// country
			$table->string('str_name')->nullable();						// str_name
			$table->string('str_no')->nullable();						// str_no
			$table->string('cp')->nullable();							// cp
			$table->string('city')->nullable();							// city
			$table->string('full')->nullable();							// city

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