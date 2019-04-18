<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConnectionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password', 512);
            $table->string('port');
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->bigInteger('connectiontype_id')->unsigned()->default(0);
            $table->bigInteger('software_id')->unsigned()->default(0);
            $table->text('desc')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('connectiontype_id')->references('id')->on('connectiontypes');
            $table->foreign('software_id')->references('id')->on('software');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('connections');
    }
}
