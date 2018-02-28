<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description');
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('project_type_id')->unsigned();
            $table->foreign('project_type_id')->references('id')->on('project_types');
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('project_user', function (Blueprint $table) {
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['project_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_types');
    }
}
