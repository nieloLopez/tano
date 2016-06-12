<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments_activities', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('fk_payment')->unsigned();
			$table->foreign('fk_payment')->references('id')->on('payments');

			$table->integer('fk_activity')->unsigned();
			$table->foreign('fk_activity')->references('id')->on('activities');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payments_activities');
	}

}
