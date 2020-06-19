<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderOfferersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_offerers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('offerer_id');
            $table->foreign('offerer_id')->references('id')->on('offerers');
            $table->uuid('tender_id');
            $table->foreign('tender_id')->references('id')->on('tenders');
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
        Schema::dropIfExists('tender_offerers');
    }
}
