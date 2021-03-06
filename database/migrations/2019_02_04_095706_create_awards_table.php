<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->uuid('tender_id');
            $table->foreign('tender_id')->references('id')->on('tenders')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('set null');
            $table->uuid('contract_method_id')->nullable();
            $table->foreign('contract_method_id')->references('id')->on('contract_methods')->onUpdate('cascade')->onDelete('set null');
            $table->string('process_number');
            $table->integer('participants_number');
            $table->double('contract_estimate_cost');
            $table->double('cost');

            $table->string('opening_act')->nullable(); //file
            $table->string('recomendation_report_act')->nullable(); //file
            $table->string('award_resolution')->nullable(); //file
            $table->string('others')->nullable(); //file
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
