<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('project_documents', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');
//            $table->string('description');
//            $table->string('path');
//            $table->integer('project_id')->unsigned();
//            $table->foreign('project_id')->references('id')->on('projects');
//            $table->boolean('approved')->nullable();
//            $table->softDeletes();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('project_documents');
    }
}
