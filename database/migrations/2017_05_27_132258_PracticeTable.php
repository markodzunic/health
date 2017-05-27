<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PracticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing permissions
        Schema::create('practices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name')->unique();
            $table->string('description');
            $table->string('address');
            $table->string('fax');
            $table->string('email');
            $table->string('site');
            $table->timestamps();

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
        Schema::drop('practice');
    }
}
