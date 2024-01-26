<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneyAutomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_automations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journey_id')->nullable();
            $table->text('email')->nullable();
            $table->text('token')->nullable();
            $table->integer('open')->nullable();
            $table->integer('click')->nullable();
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
        Schema::dropIfExists('journey_automations');
    }
}
