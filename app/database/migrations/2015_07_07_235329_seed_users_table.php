<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{        
     DB::table('users')->insert(
        array(
            array(
                'username' => 'my_user',
                'name' => 'my_user',
                'email' => 'my_user',
                'password' => Hash::make('my_password')
            ),
        ));
        
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::table('users')->delete();
	}

}
