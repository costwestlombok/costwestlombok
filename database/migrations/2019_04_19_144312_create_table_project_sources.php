<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProjectSources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_sources', function (Blueprint $table) {
            //
            $table->uuid('id')->primary();
            $table->uuid('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->uuid('source_id');
            $table->foreign('source_id')->references('id')->on('sources');
            $table->uuid('budget_id');
            $table->foreign('budget_id')->references('id')->on('budgets');
            $table->double('ammount');
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

        Schema::dropIfExists('project_sources');
        /*Schema::table('project_sources', function (Blueprint $table) {
    //
    });*/
    }
}
