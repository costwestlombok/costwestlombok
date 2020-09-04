<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvanceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('advance_id');
            $table->foreign('advance_id')->references('id')->on('advances')->onUpdate('cascade')->onDelete('cascade');
            $table->string('path');
            $table->string('image');
            $table->date('date_of_publication')->nullable();
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
        Schema::dropIfExists('advance_images');
    }
}
