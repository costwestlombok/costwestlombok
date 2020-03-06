<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('offerers_id')->unsigned();
            $table->foreign('offerers_id')->references('id')->on('offerers');
            $table->integer('tenders_id')->unsigned();
            $table->foreign('tenders_id')->references('id')->on('tenders');
            $table->string('track_tender')->nullable();
            $table->integer('statuses_id')->unsigned();
            $table->foreign('statuses_id')->references('id')->on('statuses');
            $table->integer('user_creation')->nullable();
            $table->integer('user_publication')->nullable();
            $table->datetime('published_at')->nullable();
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
