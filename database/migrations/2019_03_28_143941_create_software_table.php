<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoftwareTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('server_name');
            $table->string('status');
            $table->bigInteger('os_id')->unsigned()->default(0);
            $table->string('ip');
            $table->bigInteger('domain_id')->unsigned()->default(0);
            $table->bigInteger('location_id')->unsigned()->default(0);
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('os_id')->references('id')->on('os');
            $table->foreign('domain_id')->references('id')->on('domains');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('software');
    }
}
