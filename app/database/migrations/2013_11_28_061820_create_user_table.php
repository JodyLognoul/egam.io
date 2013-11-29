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
			$table->increments('id')->unsigned();			// id
			$table->string('name');							// name
			$table->string('surname');						// surname
			$table->date('birthday');						// birthday
			$table->string('username');						// username
			$table->string('password');						// password
			$table->timestamp('date_register');				// date_register
			$table->timestamp('date_last_con');				// date_last_con
			$table->string('email','60')->unique();		 	// email
			$table->string('url_confirmation');		 		// url_confirmation			
			$table->string('social_uid');		 			// social_uid			
			$table->string('social_provider');		 		// social_provider
			$table->string('image');		 				// image
			$table->boolean('confirmed')->default(false);	// confirmed

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