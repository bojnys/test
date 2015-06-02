<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->integer('publicPPP');//public posts per page
            $table->integer('profilePPP');//profile posts per page
            $table->integer('publicCPP');//public comments per page
            $table->integer('profileCPP');//profile comments per page
            $table->integer('defaultCommentsProfile');
            $table->integer('defaultPostsProfile');
            $table->integer('publicPostLength');
            $table->integer('profilePostLength');
			$table->timestamps();
		});
        DB::table('settings')->insert(
            array(
                'title' => 'Test',
                'publicPPP' => 3,
                'profilePPP' => 3,
                'publicCPP' => 3,
                'profileCPP' => 3,
                'defaultCommentsProfile' => 1,
                'defaultPostsProfile' => 1,
                'publicPostLength'  => 50,
                'profilePostLength' => 20
            )
        );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

}
