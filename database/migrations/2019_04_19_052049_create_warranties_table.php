<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('track_execution');
            $table->double('ammount')->nullable();
            $table->datetime('expiration_date')->nullable();
            $table->integer('executions_id')->unsigned();
            $table->foreign('executions_id')->references('id')->on('executions');
            $table->integer('warranty_types_id')->unsigned();
            $table->foreign('warranty_types_id')->references('id')->on('warranty_types');
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
        
        Schema::dropIfExists('warranties');
        /*Schema::table('warranties', function (Blueprint $table) {
            //
        });*/
    }
}
