<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name'); //Добавил
            $table->unsignedBigInteger('role'); //Добавил
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo', 200); //Добавил
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_manager')->default(0);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade'); //Добавил


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
