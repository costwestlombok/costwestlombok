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
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('contract_type_id')->nullable();
            $table->foreign('contract_type_id')->references('id')->on('contract_types')->onUpdate('cascade')->onDelete('set null');
            $table->uuid('tender_method_id')->nullable();
            $table->foreign('tender_method_id')->references('id')->on('tender_methods')->onUpdate('cascade')->onDelete('set null');
            $table->uuid('official_id')->nullable();
            $table->foreign('official_id')->references('id')->on('officials')->onUpdate('cascade')->onDelete('set null');
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
            $table->uuid('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('set null');
            $table->uuid('tender_status_id')->nullable();
            $table->foreign('tender_status_id')->references('id')->on('tender_statuses')->onUpdate('cascade')->onDelete('set null');
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
