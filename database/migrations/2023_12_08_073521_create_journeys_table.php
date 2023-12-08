<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('journey_start')->nullable();
            $table->string('journey_action')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('email_subject')->nullable();
            $table->string('template_title')->nullable();
            $table->text('template_description')->nullable();
            $table->string('filename')->nullable();
            $table->string('image_url')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_link')->nullable();
            $table->string('email_schedule')->nullable();
            $table->string('sent_time')->nullable();
            $table->string('post_recommendation')->nullable();
            $table->string('course_recommendation')->nullable();
            $table->string('post_recommendation_count')->nullable();
            $table->string('course_recommendation_count')->nullable();
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
        Schema::dropIfExists('journeys');
    }
}
