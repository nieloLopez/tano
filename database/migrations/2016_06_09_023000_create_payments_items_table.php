<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('date_payment');

			$table->integer('fk_payment')->unsigned();
			$table->foreign('fk_payment')->references('id')->on('payments');

			$table->integer('fk_customer_admin')->unsigned();
			$table->foreign('fk_customer_admin')->references('id')->on('customers');

			$table->integer('amount_pay')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payments_items');
	}

}
