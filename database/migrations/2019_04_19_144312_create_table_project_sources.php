<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('track_project');
            $table->double('ammount')->nullable();
            $table->double('exchange_rate')->nullable();
            $table->integer('projects_id')->unsigned();
            $table->foreign('projects_id')->references('id')->on('projects');
            $table->integer('sources_id')->unsigned();
            $table->foreign('sources_id')->references('id')->on('sources');
            $table->integer('currencies_id')->unsigned();
            $table->foreign('currencies_id')->references('id')->on('currencies');
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
        
        Schema::dropIfExists('project_sources');
        /*Schema::table('project_sources', function (Blueprint $table) {
            //
        });*/
    }
}
