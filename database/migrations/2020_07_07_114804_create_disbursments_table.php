<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisbursmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disbursments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('order')->nullable();
            $table->date('date');
            $table->string('description', 500)->nullable();
            $table->double('amount');
            $table->uuid('executions_id');
            $table->foreign('executions_id')->references('id')->on('executions');
            $table->uuid('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('disbursments');
    }
}
