<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsectors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sectors_id')->unsigned();
            $table->foreign('sectors_id')->references('id')->on('sectors');
            $table->string('subsector_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('subsectors');
        Schema::dropIfExists('subsectors');
    }
}
