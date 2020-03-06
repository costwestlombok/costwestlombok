<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('track_engage');
            $table->string('track_contract');
            $table->integer('n_modifiy')->nullable();
            $table->string('modification_type')->nullable();
            $table->text('justification')->nullable();
            $table->double('current_price')->nullable();
            $table->text('contract_current_scope')->nullable();
            $table->string('adendum')->nullable();;
            $table->string('current_prog')->nullable();
            $table->string('other')->nullable();
            $table->datetime('date')->nullable();
            $table->datetime('contract_date')->nullable();
            $table->integer('engages_id')->unsigned();
            $table->foreign('engages_id')->references('id')->on('engages');
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
        Schema::dropIfExists('contracts');
    }
}
