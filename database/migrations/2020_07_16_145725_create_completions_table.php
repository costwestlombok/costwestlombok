<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('contracts_id');
            $table->foreign('contracts_id')->references('id')->on('contracts');
            $table->string('final_scope', 300)->nullable();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->string('justification', 500)->nullable();
            $table->double('final_cost')->nullable();
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
        Schema::dropIfExists('completions');
    }
}
