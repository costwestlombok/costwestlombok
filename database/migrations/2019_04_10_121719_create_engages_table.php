<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('track_engage');
            $table->string('track_award');
            $table->string('contract_number')->nullable();
            $table->string('contract_title')->nullable();
            $table->string('contract_scope')->nullable();
            $table->double('price_local_currency')->nullable();
            $table->double('price_usd_currency')->nullable();
            $table->text('contract_notes')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->integer('duration')->nullable();

            $table->integer('awards_id')->unsigned();
            $table->foreign('awards_id')->references('id')->on('awards');
            $table->integer('organizations_id')->unsigned();
            $table->foreign('organizations_id')->references('id')->on('organizations');
            $table->integer('offerers_id')->unsigned();
            $table->foreign('offerers_id')->references('id')->on('offerers');
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
        Schema::dropIfExists('engages');
    }
}
