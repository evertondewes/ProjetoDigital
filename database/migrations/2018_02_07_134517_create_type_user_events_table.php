<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeUserEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_user_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_user_id')->unsigned()->index();
            $table->foreign('type_user_id')->references('id')->on('type_users');
            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('type_user_events');
    }
}
