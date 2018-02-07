<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_people', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id')->unsigned()->index();
            $table->foreign('person_id')->references('id')->on('people');
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->integer('created_by')->unsigned()->index();
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
            $table->integer('deleted_by')->nullable()->unsigned()->index();
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_people');
    }
}
