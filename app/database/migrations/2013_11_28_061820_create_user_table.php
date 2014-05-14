<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// USER
		Schema::create('users', function($table){

			// Fields
			$table->increments('id')->unsigned();          // id
			$table->string('name')->nullable();            // name
			$table->string('surname')->nullable();         // surname
			$table->string('birthday')->nullable();        // birthday
			$table->string('username');                    // username
			$table->string('password');                    // password
			$table->timestamp('date_register');            // date_register
			$table->timestamp('date_last_con');            // date_last_con
			$table->string('email','60')->unique();        // email
			$table->string('url_confirmation');            // url_confirmation			
			$table->string('social_uid')->nullable();      // social_uid			
			$table->string('social_provider')->nullable(); // social_provider
			$table->string('image')->nullable();           // image
			$table->boolean('confirmed')->default(false);  // confirmed

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
		Schema::drop('users');
	}

}