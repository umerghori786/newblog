<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsenseConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adsense_conditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_segment_id')->nullable();
            $table->unsignedBigInteger('template1_id')->nullable();
            $table->unsignedBigInteger('template2_id')->nullable();
            $table->unsignedBigInteger('template3_id')->nullable();
            $table->unsignedBigInteger('time_1')->nullable();
            $table->unsignedBigInteger('time_2')->nullable();
            $table->unsignedBigInteger('time_3')->nullable();
            $table->unsignedBigInteger('hour_1')->nullable();
            $table->unsignedBigInteger('hour_2')->nullable();
            $table->unsignedBigInteger('hour_3')->nullable();
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
        Schema::dropIfExists('adsense_conditions');
    }
}
