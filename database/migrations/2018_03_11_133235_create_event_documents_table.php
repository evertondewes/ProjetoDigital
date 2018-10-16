<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            // $table->binary('content');
            $table->string('description')->nullable();
            $table->boolean('approved')->nullable();
            $table->integer('document_type_id')->unsigned();
            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');
            $table->softDeletes();
            $table->timestamps();
        });

        /* ## configurações necessárias no config do mysql para arquivos grandes
                max_allowed_packet      = 110M
                innodb_buffer_pool_size=511M
                innodb_log_file_size=500M
                innodb_log_buffer_size = 800M
                net_read_timeout        = 600
                net_write_timeout       = 600
         */

        DB::statement("ALTER TABLE event_documents ADD content LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_documents');
    }
}
