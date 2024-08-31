<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLmsTagSubscriberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lms_tag_subscriber', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->unsignedBigInteger('subscriber_id')->nullable();
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
        Schema::dropIfExists('lms_tag_subscriber');
    }
}
