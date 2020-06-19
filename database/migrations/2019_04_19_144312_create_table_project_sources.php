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
            $table->string('track_project');
            $table->double('ammount')->nullable();
            $table->double('exchange_rate')->nullable();
            $table->uuid('projects_id');
            $table->foreign('projects_id')->references('id')->on('projects');
            $table->uuid('sources_id');
            $table->foreign('sources_id')->references('id')->on('sources');
            $table->uuid('currencies_id');
            $table->foreign('currencies_id')->references('id')->on('currencies');
            $table->uuid('statuses_id');
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

        Schema::dropIfExists('project_sources');
        /*Schema::table('project_sources', function (Blueprint $table) {
    //
    });*/
    }
}
