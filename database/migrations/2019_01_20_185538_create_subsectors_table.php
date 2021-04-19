<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->uuid('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectors')->onUpdate('cascade')->onDelete('cascade');
            $table->string('subsector_name');
            $table->string('subsector_code')->nullable();
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
        //Schema::drop('subsectors');
        Schema::dropIfExists('subsectors');
    }
}
