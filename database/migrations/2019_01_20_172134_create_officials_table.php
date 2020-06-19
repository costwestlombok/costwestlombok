<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->uuid('entity_unit_id');
            $table->foreign('entity_unit_id')->references('id')->on('organization_units');
            $table->string('name')->nullable();
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
