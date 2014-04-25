<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	
 
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('password_temp');
            $table->string('code');
            $table->integer('active');
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::drop('users');
    }
 

}
