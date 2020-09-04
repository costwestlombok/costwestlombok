<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->uuid('id')->primary();
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

            $table->uuid('awards_id');
            $table->foreign('awards_id')->references('id')->on('awards')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('organizations_id');
            $table->foreign('organizations_id')->references('id')->on('organizations')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('offerers_id');
            $table->foreign('offerers_id')->references('id')->on('offerers')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('statuses_id');
            $table->foreign('statuses_id')->references('id')->on('statuses')->onUpdate('cascade')->onDelete('cascade');
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
