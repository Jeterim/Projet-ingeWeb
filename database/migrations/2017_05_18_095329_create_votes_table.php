<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('potin_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('vote_type');
            //$table->foreign('potin_id')->references('id')->on('potins');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->foreign('potin_id')->references('id')->on('potins');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
