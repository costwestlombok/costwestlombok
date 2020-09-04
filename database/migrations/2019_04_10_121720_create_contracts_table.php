<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
            $table->uuid('awards_id');
            $table->foreign('awards_id')->references('id')->on('awards')->onUpdate('cascade')->onDelete('cascade');
            $table->string('number')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->datetime('max_extend_date')->nullable();
            $table->integer('duration')->nullable();
            $table->string('contract_title', 500)->nullable();
            $table->text('contract_scope')->nullable();
            $table->double('price_local_currency')->nullable();
            $table->double('price_usd_currency')->nullable();
            $table->uuid('suppliers_id');
            $table->foreign('suppliers_id')->references('id')->on('offerers')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
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
