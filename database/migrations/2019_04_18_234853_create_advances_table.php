<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('track_advance');
            $table->string('track_execution');
            $table->decimal('pecent_programmed', 15, 2)->nullable();
            $table->decimal('percent_real', 15, 2)->nullable();
            $table->decimal('finance_programmed', 15, 2)->nullable();
            $table->decimal('finance_real', 15, 2)->nullable();
            $table->string('description_problems')->nullable();
            $table->string('description_issues')->nullable();
            $table->date('advance_date')->nullable();
            $table->string('file_warranties')->nullable();
            $table->string('file_advance')->nullable();
            $table->string('file_supervision')->nullable();
            $table->string('file_evaluation')->nullable();
            $table->string('file_technic')->nullable();
            $table->string('file_finance')->nullable();
            $table->string('file_reception')->nullable();
            $table->string('file_unpleased')->nullable();
            $table->integer('executions_id')->unsigned();
            $table->foreign('executions_id')->references('id')->on('executions');
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
        Schema::dropIfExists('advances');
    }
}
