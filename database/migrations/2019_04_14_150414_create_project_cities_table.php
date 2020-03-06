<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('benefit');
            $table->date('date_published')->nullable();
            $table->integer('projects_id')->unsigned();
            $table->foreign('projects_id')->references('id')->on('projects');
            $table->integer('cities_id')->unsigned();
            $table->foreign('cities_id')->references('id')->on('cities');
            $table->string('city_code')->nullable();
            $table->integer('states_id')->unsigned();
            $table->foreign('states_id')->references('id')->on('states');
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
        Schema::dropIfExists('project_cities');
    }
}
