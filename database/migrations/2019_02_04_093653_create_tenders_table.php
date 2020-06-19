<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->uuid('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->uuid('contract_type_id');
            $table->foreign('contract_type_id')->references('id')->on('contract_types');
            $table->uuid('tender_method_id');
            $table->foreign('tender_method_id')->references('id')->on('tender_methods');
            $table->uuid('official_id');
            $table->foreign('official_id')->references('id')->on('officials');
            $table->string('process_number')->nullable();
            $table->text('project_process_name')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('max_extended_process')->nullable();
            $table->integer('duration')->nullable(); // in days
            $table->double('amount')->nullable();
            $table->string('evaluation_process')->nullable(); //file?
            $table->string('international_invitation')->nullable(); //file?
            $table->string('basement')->nullable(); //file?
            $table->string('resolution')->nullable(); //file?
            $table->string('convocation')->nullable(); //file?
            $table->string('tdr')->nullable(); //file?
            $table->string('clarification')->nullable(); //file?
            $table->string('acceptance_certificate')->nullable(); //file?
            $table->uuid('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->date('date_of_publication')->nullable();
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
