<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmmendmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ammendments', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('engaged_id');
            $table->foreign('engaged_id')->references('id')->on('engages');
            $table->integer('modification_number')->nullable();
            $table->string('modification_type')->nullable();
            $table->string('justification')->nullable();
            $table->double('current_price')->nullable();
            $table->string('current_contract_scope')->nullable();
            $table->uuid('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->datetime('date_of_publication')->nullable();
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
        Schema::dropIfExists('ammendments');
    }
}
