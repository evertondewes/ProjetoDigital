<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonTypeToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->integer('person_id')->unsigned()->index();
            $table->foreign('person_id')->references('id')->on('people');
            $table->integer('type_user_id')->unsigned()->index();
            $table->foreign('type_user_id')->references('id')->on('type_users');
            $table->integer('created_by')->unsigned()->index();
            //  $table->foreign('created_by')->references('id')->on('users');
            $table->integer('deleted_by')->nullable()->unsigned()->index();
            $table->foreign('deleted_by')->references('id')->on('users');
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
