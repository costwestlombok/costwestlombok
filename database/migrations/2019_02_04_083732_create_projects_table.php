<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('track_project');
            $table->string('project_code')->nullable();
            $table->string('project_name')->nullable();
            $table->text('project_description')->nullable();
            $table->string('project_code_sefin')->nullable();
            $table->double('project_budget')->nullable();      
            $table->datetime('project_budget_approved')->nullable();
            $table->text('environment_effect_description')->nullable();
            $table->text('resettlement_description')->nullable();
            $table->string('initial_lat')->nullable();
            $table->string('initial_lon')->nullable();
            $table->string('final_lat')->nullable();
            $table->string('final_lon')->nullable();
            $table->string('file_work_plans')->nullable();
            $table->string('file_budget_multianual_program')->nullable();
            $table->string('file_feasibility_study')->nullable();
            $table->string('file_environment_effect_study')->nullable();
            $table->string('file_environment_license_mitigation_contract')->nullable();
            $table->string('file_resettlement_compensation_plan')->nullable();
            $table->string('file_financing_agreement')->nullable();
            $table->string('file_approval_description')->nullable();
            $table->string('file_others')->nullable();
            $table->integer('organizations_id')->unsigned();
            $table->foreign('organizations_id')->references('id')->on('organizations');
            $table->integer('organization_units_id')->nullable();
            $table->integer('sectors_id')->unsigned();
            $table->foreign('sectors_id')->references('id')->on('sectors');
            $table->integer('subsectors_id')->nullable();
            $table->integer('purposes_id')->unsigned();
            $table->foreign('purposes_id')->references('id')->on('purposes');
            $table->integer('officials_id')->nullable();
            $table->integer('roles_id')->nullable();
            $table->integer('statuses_id')->unsigned();
            $table->foreign('statuses_id')->references('id')->on('statuses');
            $table->integer('user_creation')->nullable();
            $table->integer('user_publication')->nullable();
            $table->dateTime('published_at')->nullable();
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
