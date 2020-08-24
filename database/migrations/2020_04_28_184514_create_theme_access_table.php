<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_accesses');
    }
}
