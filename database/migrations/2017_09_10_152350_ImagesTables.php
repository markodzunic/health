<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function ($table) {
            $table->increments('id');
            $table->integer('name');
            $table->integer('path');
            $table->integer('thumb');
            $table->timestamps();
          });
        
        Schema::create('documents', function ($table) {
            $table->increments('id');
            $table->integer('name');
            $table->integer('path');
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
        //
    }
}
