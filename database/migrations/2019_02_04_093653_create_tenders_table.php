<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('track_tender');
            $table->string('track_project');
            $table->string('process_number')->nullable();
            $table->text('process_name')->nullable();
            $table->string('file_invitation')->nullable();
            $table->string('file_qualification_bases')->nullable();
            $table->string('file_resolution_stating_qualification')->nullable();
            $table->string('file_call_for_tender')->nullable();
            $table->string('file_terms_conditions')->nullable();
            $table->string('file_amendments')->nullable();
            $table->string('file_acceptance_certificate')->nullable();
            $table->string('file_others')->nullable();
            $table->integer('projects_id')->unsigned();
            $table->foreign('projects_id')->references('id')->on('projects');
            $table->integer('organizations_id')->unsigned();
            $table->foreign('organizations_id')->references('id')->on('organizations');
            $table->integer('organization_units_id')->nullable();
            $table->integer('contract_types_id')->unsigned();
            $table->foreign('contract_types_id')->references('id')->on('contract_types');
            $table->integer('tender_methods_id')->unsigned();
            $table->foreign('tender_methods_id')->references('id')->on('tender_methods');
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
        //Schema::drop('tenders');
        Schema::dropIfExists('tenders');
    }
}
