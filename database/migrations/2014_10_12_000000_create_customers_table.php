<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('dni')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->date('birthday');
            $table->string('address');
            $table->string('telephone');
            
            $table->integer('fk_rol')->unsigned();
            $table->foreign('fk_rol')->references('id')->on('roles');
            
            $table->boolean('active')->default(1);
            $table->rememberToken();
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
        Schema::drop('customers');
    }

}
