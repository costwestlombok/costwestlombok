<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->string('benefit');
            $table->date('date_published')->nullable();
            $table->uuid('projects_id');
            $table->foreign('projects_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('cities_id');
            $table->foreign('cities_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->string('city_code')->nullable();
            $table->uuid('states_id');
            $table->foreign('states_id')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('statuses_id');
            $table->foreign('statuses_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
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
