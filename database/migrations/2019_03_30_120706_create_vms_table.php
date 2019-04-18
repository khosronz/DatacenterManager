<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVmsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password',512);
            $table->string('ip');
            $table->text('desc')->nullable();
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->bigInteger('vmtype_id')->unsigned()->default(0);
            $table->bigInteger('software_id')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vmtype_id')->references('id')->on('vmtypes');
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
        Schema::drop('vms');
    }
}
