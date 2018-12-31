<?php
// file_put_contents(sys_get_temp_dir() .'\\teste\\'. basename(__FILE__, '.php') . '_' . __LINE__ . '_.txt', 1, FILE_APPEND);
// C:\Users\jfrs\AppData\Local\Temp\teste

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('role_id')->unsigned();
            $table->integer('person_id')->nullable()->unsigned();
            $table->boolean('active')->default(false);
            $table->integer('created_by')->nullable()->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('deleted_by')->nullable()->unsigned();
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->rememberToken();
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}
