<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StripeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function ($table) {
        $table->string('stripe_id')->nullable();
        $table->string('card_brand')->nullable();
        $table->string('card_last_four')->nullable();
        $table->timestamp('trial_ends_at')->nullable();
      });

      Schema::create('subscriptions', function ($table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->string('name');
        $table->string('stripe_id');
        $table->string('stripe_plan');
        $table->integer('quantity');
        $table->integer('billing_address_id');
        $table->timestamp('trial_ends_at')->nullable();
        $table->timestamp('ends_at')->nullable();
        $table->timestamps();
      });

      Schema::create('billing_address', function ($table) {
        $table->increments('id');
        $table->integer('practices_id');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('phone');
        $table->string('email');
        $table->string('company');
        $table->string('address_1');
        $table->string('address_2')->nullable();
        $table->string('city');
        $table->string('state');
        $table->string('country');
        $table->string('zip')->nullable();
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
