<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->double('vartime')->nullable();
            $table->double('varprice')->nullable();
            $table->datetime('start_date')->nullable();
            $table->string('program')->nullable();
            $table->string('contract_state')->nullable();
            $table->uuid('engage_id');
            $table->foreign('engage_id')->references('id')->on('contracts')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('contact_id')->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
            $table->datetime('date_of_publication')->nullable();
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
        Schema::dropIfExists('executions');
    }
}
