<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('stores')->insert(
        array(
            array(
                'name' => 'Store1',
                'address' => 'First address',
            ),
            array(
                'name' => 'Store2',
                'address' => 'Another Address',
            ),
            array(
                'name' => 'Store3',
                'address' => 'Address 3',
            ),
            array(
                'name' => 'Store4',
                'address' => 'Address',
            ),
            array(
                'name' => 'Store5',
                'address' => 'Address',
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
		DB::table('stores')->delete();
	}

}
