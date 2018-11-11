<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTypeProjectTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_type_project_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_type_id')->unsigned();
            $table->foreign('project_type_id')->references('id')->on('project_types');
            $table->integer('document_type_id')->unsigned();
            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->softDeletes();
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
        Schema::dropIfExists('document_type_project_type');
//        Schema::dropIfExists('project_types');
//        Schema::dropIfExists('document_types');
    }
}
