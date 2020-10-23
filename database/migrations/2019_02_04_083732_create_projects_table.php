<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('subsector_id')->nullable();
            $table->foreign('subsector_id')->references('id')->on('subsectors')->onUpdate('cascade')->onDelete('set null');
            $table->uuid('official_id')->nullable();
            $table->foreign('official_id')->references('id')->on('officials')->onUpdate('cascade')->onDelete('set null');
            $table->uuid('purpose_id')->nullable();
            $table->foreign('purpose_id')->references('id')->on('purposes')->onUpdate('cascade')->onDelete('set null');
            $table->uuid('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('set null');
            $table->uuid('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('set null');
            $table->string('project_code')->nullable();
            $table->string('project_title')->nullable();
            $table->text('project_description')->nullable();
            $table->double('budget')->nullable();
            $table->string('code_sefin')->nullable();
            $table->text('environment_desc')->nullable();
            $table->text('settlement_desc')->nullable();
            $table->string('initial_lat')->nullable();
            $table->string('initial_lon')->nullable();
            $table->string('final_lat')->nullable();
            $table->string('final_lon')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->integer('duration')->nullable(); //in days
            $table->datetime('lifetime_start_date')->nullable();
            $table->datetime('lifetime_end_date')->nullable();
            $table->datetime('date_of_publication')->nullable();
            $table->datetime('date_of_approved')->nullable();
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
        //Schema::drop('projects');
        Schema::dropIfExists('projects');
    }
}
