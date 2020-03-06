<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExecutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('track_execution');
            $table->string('track_engage');
            $table->double('vartime')->nullable();
            $table->double('varprice')->nullable();
            $table->datetime('start_date')->nullable();
            $table->string('program')->nullable();
            $table->integer('contract_state')->nullable();
            $table->integer('engages_id')->unsigned();
            $table->foreign('engages_id')->references('id')->on('engages');
            $table->integer('contacts_id')->unsigned();
            $table->foreign('contacts_id')->references('id')->on('contacts');
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
        Schema::dropIfExists('executions');
    }
}
