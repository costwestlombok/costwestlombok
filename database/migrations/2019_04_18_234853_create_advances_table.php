<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->uuid('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
            $table->float('programmed_percent')->nullable();
            $table->float('real_percent')->nullable();
            $table->decimal('scheduled_financing')->nullable();
            $table->decimal('real_financing')->nullable();
            $table->string('description_problems')->nullable();
            $table->string('description_issues')->nullable();
            $table->string('guaranties_doc')->nullable();
            $table->string('advance_doc')->nullable();
            $table->date('date_of_advance')->nullable();
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
        Schema::dropIfExists('advances');
    }
}
