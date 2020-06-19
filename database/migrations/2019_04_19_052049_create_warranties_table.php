<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranties', function (Blueprint $table) {
            //
            $table->uuid('id')->primary();
            $table->double('ammount')->nullable();
            $table->datetime('expiration_date')->nullable();
            $table->uuid('executions_id');
            $table->foreign('executions_id')->references('id')->on('executions');
            $table->uuid('warranty_types_id');
            $table->foreign('warranty_types_id')->references('id')->on('warranty_types');
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

        Schema::dropIfExists('warranties');
        /*Schema::table('warranties', function (Blueprint $table) {
    //
    });*/
    }
}
