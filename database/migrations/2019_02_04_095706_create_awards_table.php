<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('track_award');
            $table->string('track_tender');
            $table->string('process_number');
            $table->double('contract_estimate_cost');
            $table->integer('participants_number');

            $table->string('file_opening_act');
            $table->string('file_recomendation_report_act');      
            $table->string('file_award_resolution');
            $table->string('file_others');

            $table->integer('tenders_id')->unsigned();
            $table->foreign('tenders_id')->references('id')->on('tenders');
            $table->integer('contract_methods_id')->unsigned();
            $table->foreign('contract_methods_id')->references('id')->on('contract_methods');
            $table->integer('statuses_id')->unsigned();
            $table->foreign('statuses_id')->references('id')->on('statuses');
            $table->integer('user_creation')->nullable();
            $table->integer('user_publication')->nullable();
            $table->dateTime('published_at')->nullable();
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
        //Schema::drop('awards');
        Schema::dropIfExists('awards');
    }
}
