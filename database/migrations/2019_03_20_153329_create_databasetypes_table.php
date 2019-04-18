<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDatabasetypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('databasetypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('standard_port')->nullable();
            $table->text('desc')->nullable();
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
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
        Schema::drop('databasetypes');
    }
}
