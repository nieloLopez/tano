<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->date('date_payment');
            $table->date('date_payment_expiration');
                                 
            $table->integer('fk_customer')->unsigned();
            $table->foreign('fk_customer')->references('id')->on('customers');

            $table->integer('fk_customer_admin')->unsigned();
            $table->foreign('fk_customer_admin')->references('id')->on('customers');
            
            $table->integer('price')->unsigned();
            $table->integer('amount')->unsigned();
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('payments');
        
    }

}
