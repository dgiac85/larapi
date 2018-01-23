<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 32)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //optionals
            $table->string('lastname',32)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('province', 32)->nullable();
            //per dire che un dato non è auto-increment (secondo parametro) e che è unsigned (terzo parametro)
            $table->smallInteger('age',false, true)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
