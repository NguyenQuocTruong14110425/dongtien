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
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('sub_name')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('gender')->nullable();
            $table->string('user_code')->nullable();
            $table->string('introduce')->nullable();
            $table->string('avatar')->nullable();
            $table->string('status')->nullable();
            $table->integer('follow')->default(1);
            $table->integer('friends')->default(1);
            $table->string('auth')->default('client');
            $table->tinyInteger('IsDelete')->default(0);
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
        Schema::dropIfExists('users');
    }
}
