<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidebaroffersericeConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebarofferserice_conditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('automation_id')->nullable();
            $table->unsignedBigInteger('offer_id')->nullable();
            $table->unsignedBigInteger('segment_offer_id')->nullable();
            $table->unsignedBigInteger('newlist_offer_id')->nullable();
            $table->unsignedBigInteger('neewgroup_offer_id')->nullable();
            $table->unsignedBigInteger('tag_offer_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('segment_service_id')->nullable();
            $table->unsignedBigInteger('newlist_service_id')->nullable();
            $table->unsignedBigInteger('neewgroup_service_id')->nullable();
            $table->unsignedBigInteger('tag_service_id')->nullable();
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
        Schema::dropIfExists('sidebarofferserice_conditions');
    }
}
