<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officials', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('organizations_id')->unsigned();
            $table->foreign('organizations_id')->references('id')->on('organizations');
            $table->integer('organization_units_id')->nullable();
            $table->string('official_name')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
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
        //Schema::drop('officials');
        Schema::dropIfExists('officials');
        //Schema::table('officials', function (Blueprint $table) {
            //
        //});
    }
}
