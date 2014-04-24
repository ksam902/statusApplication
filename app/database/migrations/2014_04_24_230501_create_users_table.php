<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	
 
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('password_temp');
            $table->string('code');
            $table->integer('active');
            $table->biginteger('activate_code');
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::drop('users');
    }
 

}
